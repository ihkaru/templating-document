<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .page-break {
            page-break-after: always;
        }
        body {
            font-family: "Arial Narrow", Arial, sans-serif
        }
        h1 { font-family: "Arial Narrow", Arial, sans-serif; font-size: 24px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px; }
        h3 { font-family: "Arial Narrow", Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px; }
        p { font-family: "Arial Narrow", Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 20px; }
        blockquote { font-family: "Arial Narrow", Arial, sans-serif; font-size: 21px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 30px; }
        pre { font-family: "Arial Narrow", Arial, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 18.5714px; }
   </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    @foreach ($petugas as $p)

    <div class="container w-full">
        <header class="w-full text-center">
            <div class="font-bold">Bukti Foto Pembayaran</div>
            <div>Honor Penunjuk Jalan Dalam Rangka Pelaksanaan Pendataan Registrasi Sosial Ekonomi (Regsosek) Tahun 2022</div>
            <div>BPS Kabupaten Kubu Raya</div>
        </header>
        <section class="flex flex-row w-full">
            <section class="flex-none">
                <table>
                    <tr>
                        @if (!$p->penunjukJalan->first())
                            {{dd($p)}}
                        @endif
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td contenteditable>{{ucwords(strtolower($p->penunjukJalan->first()->sls->kec))}}</td>
                    </tr>
                    <tr>
                        <td>Desa</td>
                        <td>:</td>
                        <td contenteditable>{{ucwords(strtolower($p->penunjukJalan->first()->sls->desa))}}</td>
                    </tr>
                </table>
            </section>
            <div class="grow"></div>
            <section class="flex-none">
                <table>
                    <tr>
                        <td>Nama Koseka</td>
                        <td>:</td>
                        <td contenteditable>{{$p->koseka}}</td>
                    </tr>
                    <tr>
                        <td>Nama PML</td>
                        <td>:</td>
                        <td contenteditable>{{$p->pml}}</td>
                    </tr>
                    <tr>
                        <td>Nama PPL</td>
                        <td>:</td>
                        <td contenteditable>{{$p->nama}}</td>
                    </tr>
                    <tr>
                        <td>Kode Petugas</td>
                        <td>:</td>
                        <td contenteditable>{{$p->id}}</td>
                    </tr>
                </table>
            </section>
        </section>
        <section>
            <table style="border: 1px solid black" class="w-full">
                @foreach ($p->penunjukJalan as $sls )
                <tr style="border: 1px solid black" class="w-full">
                    <td class="flex-none pl-3">
                        <p>Kode SLS</p>
                        <p>Nama Penerima Honor</p>
                        <p>Nama SLS</p>
                    </td>
                    <td class="flex-none">
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                    </td>
                    <td class="flex-none">
                        <p contenteditable>{{$sls->sls_id}}</p>
                        <p contenteditable>{{$sls->nama}}</p>
                        <p contenteditable>{{$sls->sls->nama}}</p>
                    </td>
                    <td class="grow"></td>
                    <td class="flex-none text-right" >
                        @if (count(explode("=",$sls->link))>1)
                        <img class="mr-0" width="200" src="https://drive.google.com/uc?export=view&id={{explode("=",$sls->link)[1]}}" alt="{{$sls->nama}}">
                        @else
                        <img class="mr-0" width="200"  src="{{$sls->link}}" alt="{{$sls->nama}}">
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </section>

    </div>
    <div class="page-break"></div>
    @endforeach

    {{-- @if ($loop->iteration % 3 == 0)
    @endif
        <p>Nama Koseka: {{$p->koseka}}</p>
        <p>Nama PML: {{$p->pml}}</p>
        <p>Nama PPL: {{$p->ppl}}</p>
        <p>Nama SLS: {{$p->nama_sls}}</p>
        <p>Kode SLS: {{$p->kode_sls}}</p>
        <p>Nama Penerima Honor: {{$p->penerima}}</p> --}}


</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.designMode = "on";
}, false);
</script>
</html>
