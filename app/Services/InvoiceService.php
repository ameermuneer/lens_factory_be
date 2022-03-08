<?php
/**
 * Created by PhpStorm.
 * User: 96ame
 * Date: 2/6/2022
 * Time: 11:55 PM
 */

namespace App\Services;


use App\Models\Invoice;
use App\Models\Lens;
use App\Traits\ResponseMessage;

class InvoiceService
{
    use ResponseMessage ;
    public $rx ; public $ry ;public $rz ;public $rb ;
    public $lx ; public $ly ;public $lz ;public $lb ;
    public $add1 ; public $add2 ; public $lens_id ;  public $lens ; public $customer ;
    public $r_smaller ; public $r_bigger ; public $l_smaller ; public $l_bigger ;
    public $data ;
    public $L , $R ;
    public $err = [] ;
    public function __construct($data)
    {
        $this->data = $data ;
//        $this->rx = $data['rx'] ;
//        $this->ry = $data['ry'] ;
//        $this->rz = $data['rz'] ;
//        $this->rb = $data['rb'] ;
//
//        $this->lx = $data['lx'] ;
//        $this->ly = $data['ly'] ;
//        $this->lz = $data['lz'] ;
//        $this->lb = $data['lb'] ;
//
//        $this->add1 = $data['add1'] ;
//        $this->add2 = $data['add2'] ;
        $this->lens = Lens::find($data['lens_id']) ;
        $this->customer = $data['customer'] ;

    }
    public function calculateInvoice(){

        $this->setSides() ;
        $this->validateLRXYNull() ;
        $this->validateXYQuarter_LR() ;
        $this->validateBaseRequired_LR() ;
        $this->findTrueBaseofLens_LR() ;
        // validate if we need to replace x , y with table of 1.56
        $this->processActiveRaw_LR() ;
        $this->setNullToZero() ;
        // calculate
        $this->calculateBiggerSmaller_LR() ;
        Invoice::create($this->data);

    }
    private function calculateBiggerSmaller_LR(){
        $this->calculateBiggerSmaller('l') ;
        $this->calculateBiggerSmaller('r') ;
    }
    private function calculateBiggerSmaller($side){
        $leg = $side == 'r' ? $this->R : $this->L ;

        if ($leg ) {
             $bigger = $this->data[$side.'b_true'] - $this->data[$side.'x'] ;
             $smaller = $bigger - $this->data[$side.'y'] ;
             $this->data[$side.'_smaller'] = $smaller ;
             $this->data[$side.'_bigger'] = $bigger ;
        }

    }

    private function processActiveRaw_LR(){
        $this->processActiveRaw('l') ;
        $this->processActiveRaw('r') ;
    }
    private function processActiveRaw($side){
        $leg = $side == 'r' ? $this->R : $this->L ;

        if ($leg){
            $raw = $this->lens->raw ;
            if ($raw->active){
                if (isset($this->data[$side.'x'])){
                    $rawValue = $raw->values()->where('power',$this->data[$side.'x'])->first() ;

                    if (!$rawValue)
                        abort($this->errors(422,[strtoupper($side).'x' .'غير صحيحة لهذه المادة الخام'])) ;

//                    $this->err->push(strtoupper($side).'x' .'غير صحيحة لهذه المادة الخام') ;
                    else
                        // replace x by new one
                        $this->data[$side.'x'] = $rawValue->value ;

                }
                if (isset($this->data[$side.'y'])){
                    $rawValue = $raw->values()->where('power',$this->data[$side.'y'])->first() ;
                    if (!$rawValue)
                        abort($this->errors(422,[strtoupper($side).'y' .'غير صحيحة لهذه المادة الخام'])) ;

//                    $this->err->push(strtoupper($side).'y' .'غير صحيحة لهذه المادة الخام') ;
                    else
                        // replace y by new one
                        $this->data[$side.'y'] = $rawValue->value ;
                }

            }
        }
    }

    private function validateXYQuarter_LR(){
        $this->validateXYQuarter('l') ;
        $this->validateXYQuarter('r') ;
    }
    private function validateXYQuarter($side){
        $leg = $side == 'r' ? $this->R : $this->L ;

        if ($leg){
            if (isset($this->data[$side.'x'])) {
                $q = $this->data['rx'] / 0.25;

                if ($q != floor($q))
                    abort($this->errors(422, [strtoupper($side) . 'x' . ' يجب ان تكون من مضاعفات 0.25 ']));
            }
            if (isset($this->data[$side.'y'])){
                $q = $this->data['ry'] / 0.25;
                if ($q != floor($q))
                    abort($this->errors(422,[strtoupper($side).'y' . ' يجب ان تكون من مضاعفات 0.25 '])) ;

//            $this->err->push(strtoupper($side).'y' . 'يجب ان تكون من مضاعفات 0.25') ;
            }
        }

    }
    private function validateBaseRequired_LR(){
        $this->validateBaseRequired('l') ;
        $this->validateBaseRequired('r') ;
    }
    private function validateBaseRequired($side){
        $leg = $side == 'r' ? $this->R : $this->L ;

        if ($leg && !isset($this->data[$side.'b'])){
            abort($this->errors(422,[strtoupper($side).'b' . '  لا يمكن ان تكون فارغة'.'  -  x او y تحتوي على قيمة'])) ;
        }
    }
    private function findTrueBaseofLens_LR(){
        if ($this->L)
            $this->findTrueBaseofLens('l') ;
        if ($this->R)
            $this->findTrueBaseofLens('r') ;
    }
    private function findTrueBaseofLens($side){
        $base = $this->lens->bases()->where('base',$this->data[$side.'b'])->first() ;

        if (!$base)
            abort($this->errors(422,[strtoupper($side).'b' .' غير صحيح لهذه المادة '])) ;
        else
            $this->data[$side.'b_true'] = $base->true_base ;

    }



    private function validateLRXYNull(){
        if (!isset($this->L) && !isset($this->R))
            abort($this->errors(422,[' L و R  فارغة'])) ;
        $this->validateXYNull('l') ;
        $this->validateXYNull('r') ;
    }
    private function validateXYNull($side){
        $leg = $side == 'r' ? $this->R : $this->L ;
        if ($leg &&  (!isset($this->data[$side.'x']) && !isset($this->data[$side.'y']))){
            abort($this->errors(422,[strtoupper($side).'x' . 'و' . strtoupper($side).'y' . ' فارغة'])) ;
        }
    }
//    if (!isset($this->L) && !isset($this->R))
//            $this->err->push(' L و R  فارغة') ;
//        if ($this->R &&  (!isset($this->rx) && !isset($this->ry))){
//            $this->err->push(' Rx و Ry  فارغة') ;
//        }
//        if ($this->L &&  (!isset($this->lx) && !isset($this->ly))){
//            $this->err->push(' Lx و Ly  فارغة') ;
//        }

    // set nulls to zero
    public function setNullToZero(){
        if (!isset($this->data['rx']))
            $this->data['rx']= 0 ;
        if (!isset($this->data['ry']))
            $this->data['ry'] = 0 ;
        if (!isset($this->data['lx']))
            $this->data['lx'] = 0 ;
        if (!isset($this->data['ly']))
            $this->data['ly'] = 0 ;
    }
    private function setSides(){
        if ($this->validateNullSide('l'))
            $this->L = true ;
        if ($this->validateNullSide('r'))
            $this->R = true ;
    }
    private function validateNullSide($side){
        if ( isset($this->data[$side.'x']) ) {
            return true ;
        }
        if ( isset($this->data[$side.'y']) ) {
            return true ;
        }
        if ( isset($this->data[$side.'z']) ) {
            return true ;
        }
        if ( isset($this->data[$side.'b']) ) {
            return true ;
        }
        return false ;
    }
}