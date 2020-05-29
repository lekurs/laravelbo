<?php


namespace App\Repository;


use App\Http\Entity\DownPaiementInvoice;
use App\Http\Entity\Estimation;

class DownPaiementInvoiceRepository
{
    public function getOne($id): DownPaiementInvoice
    {
        return DownPaiementInvoice::find($id);
    }

    public function saveDownPaimentInvoice(array $datas, Estimation $estimation): void
    {
        $downPaimentInvoice = new DownPaiementInvoice();
        $downPaimentInvoice->number = $datas['down-invoice-number'];
        $downPaimentInvoice->title = $datas['down-invoice-title'];
        $downPaimentInvoice->amount = $datas['down-invoice-price'];


        $downPaimentInvoice->save();

        $downPaimentInvoice->estimations()->sync($estimation->id);
    }
}
