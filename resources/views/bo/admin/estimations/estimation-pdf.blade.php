<style>
    table {
        width: 100%;
        font-family: aristaproalternate;
        /*border: 1px solid red;*/
    }

    h2 {
        margin: 0;
        padding: 0;
        font-weight: bold;
        font-size: 18px;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    h3 {
        font-weight: bold;
        margin: 0;
        padding: 0;
        font-size: 13px;
    }

    td.height-line {
        height: 12px;
        margin: 0;
        padding: 0;
        font-size: 12px;
    }

</style>
<page backtop="20mm" backbottom="20mm" backleft="10mm" backright="10mm">
    <page_header>
        <img src="http://moutwebagency.net/mout/logo-mout-factures.png" style="width: 110%; height: 160px; text-align: left; margin-left: -10mm; margin-top:-5mm">
    </page_header>
    <page_footer>
        <table id="footer-bill">
            <tr>
                <td class="height-line" style="width: 100%; text-align: center">MOUT</td>
            </tr>
            <tr>
                <td class="height-line" style="width: 100%; text-align: center">moutwebagency.com</td>
            </tr>
            <tr>
                <td class="height-line" style="width: 100%; text-align: center">06 62 45 10 36 / 06 70 06 11 07</td>
            </tr>
            <tr>
                <td class="height-line" style="width: 100%; text-align: center">84 rue de Versailles / 78 150 Le Chesnay</td>
            </tr>
            <tr>
                <td class="height-line" style="width: 100%; text-align: center">SIREN : 842 793 648 / Code APE 6312Z</td>
            </tr>
            <tr>
                <td class="height-line" style="width: 100%; text-align: center">SAS au capital social de 2000 €</td>
            </tr>
        </table>
    </page_footer>

    <table style="margin-top: 30mm" class="test">
        <tr>
            <td style="width: 30%; height: 30px; border-bottom: 1px solid yellow; font-size: 18px">
                DEVIS réf : <span class="mout-estimation-number" style=" ">{{$estimation->number}}</span>
            </td>
            <td style="width: 70%; text-align: right">Fait à le Chesnay, le {{$estimation->created_at->format('d/m/Y')}}</td>
        </tr>

        <tr>
            <td colspan="2" style="font-weight: bold">{{$estimation->client->name}}</td>
        </tr>
        <tr>
            <td colspan="2">{{$estimation->contact->name}} {{$estimation->contact->lastname}} </td>
        </tr>
        <tr>
            <td colspan="2">{{$estimation->client->address}}</td>
        </tr>
        <tr>
            <td colspan="2">{{$estimation->client->zip}} {{$estimation->client->city}}</td>
        </tr>
        <tr>
            <td colspan="2">{{$estimation->contact->email}}</td>
        </tr>
    </table>
    <table style="margin-top: 10mm; table-layout: fixed; border-bottom: 1px solid yellow; padding-bottom: 5mm">
        <tr>
            <td style="width: 85%; border-bottom: 1px solid yellow"><h2>Description</h2></td>
            <td style="width: 15%; border-bottom: 1px solid yellow; text-align: right"><h2>PV HT</h2></td>
        </tr>
        <tr>
            <td style="width:85%; word-break: break-word; font-size: 14px; padding-top: 5mm">{!! $estimation->body !!}</td>
            <td style="width: 15%">&nbsp;</td>
        </tr>
    </table>

    <table style="margin-top: 10mm">
        <tr>
            <td style="text-align: right; width: 80%; font-weight: bold; text-transform: uppercase">Total HT : </td>
            <td style="text-align: right; width: 20%; font-weight: bold; text-transform: uppercase">{{number_format($estimation->price, 2)}} €</td>
        </tr>
        <tr>
            <td style="text-align: right; width: 80%; font-weight: bold; text-transform: uppercase">TVA : </td>
            <td style="text-align: right; width: 20%; font-weight: bold; text-transform: uppercase">{{number_format($estimation->price * .2, 2) }} €</td>
        </tr>
        <tr>
            <td style="text-align: right; width: 80%; font-weight: bold; text-transform: uppercase">Total TTC : </td>
            <td style="text-align: right; width: 20%; font-weight: bold; text-transform: uppercase">{{number_format(($estimation->price * 1.2), 2)}} €</td>
        </tr>
        </table>
        <nobreak>
        <table style="margin-top: 30mm">
            <tr>
                <td style="width: 80%">Conditions de paiement : </td>
                <td style="width: 20%; text-align: right">Date et signature :</td>
            </tr>

            <tr>
                <td colspan="2" style="width: 100%; text-align: right">Devis signé le :  </td>
            </tr>
            <tr>
                <td colspan="2" style="width: 100%; text-align: right">par : </td>
            </tr>
        </table>
    </nobreak>


</page>


{{--<img src="{{asset('images/bills/logo-mout-factures.png')}}" alt="MOUT" class="img-fluid">--}}
{{--<div class="mout-admin-estimation-container">--}}
{{--    <div class="mout-estimation-header-container">--}}
{{--        <H3 id="mout-estimation-number">DEVIS réf : <span class="mout-estimation-number">{{$estimation->number}}</span></H3>--}}
{{--        <p id="mout-estimation-date">Fait à le Chesnay, le {{$estimation->created_at->format('d/m/Y')}}</p>--}}
{{--    </div>--}}
{{--    <h4 class="mout-estimation-client-name">{{$estimation->client->name}}</h4>--}}
{{--    <p class="mout-estimation-contact-informations">{{$estimation->contact->name}} {{$estimation->contact->lastname}} </p>--}}
{{--    <p class="mout-estimation-contact-informations">{{$estimation->client->address}}</p>--}}
{{--    <p class="mout-estimation-contact-informations">{{$estimation->client->zip}} {{$estimation->client->city}}</p>--}}
{{--    <p class="mout-estimation-contact-informations">{{$estimation->contact->email}}</p>--}}
{{--</div>--}}

{{--<div class="mout-estimation-description">--}}
{{--    <h4 class="mout-estimation-description-title">Description</h4>--}}
{{--    <p class="mout-estimation-description-body">--}}
{{--        {{$estimation->body}}--}}
{{--    </p>--}}
{{--    <p id="mout-estimation-blank">&nbsp;</p>--}}
{{--</div>--}}

{{--<div class="mout-estimation-footer-container">--}}
{{--    <p id="mout-estimation-payment">Condition de paiement : à la réception de la facture</p>--}}

{{--    <div class="mout-estimation-bill-container">--}}
{{--        <div class="mout-estimation-bill-content-details">--}}
{{--            <p class="bill">Total HT</p>--}}
{{--            <p class="bill">TVA</p>--}}
{{--            <p class="bill">Total TTC</p>--}}
{{--        </div>--}}
{{--        <div class="mout-estimation-bill-content-price">--}}
{{--            <p class="bill">{{number_format($estimation->price, 2)}} €</p>--}}
{{--            <p class="bill">{{number_format($estimation->price * .2, 2) }} €</p>--}}
{{--            <p class="bill">{{number_format(($estimation->price * 1.2), 2)}} €</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
