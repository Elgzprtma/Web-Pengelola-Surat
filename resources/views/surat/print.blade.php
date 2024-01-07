<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pembelian</title>
    <style>
        #back-wrap {
            margin: 30px auto 0 auto;
            width: 500px;
            display: flex;
            justify-content: flex-end;
        }

        .btn-back {
            width: fit-content;
            padding: 8px 15px;
            color: #fff;
            background: #666;
            border-radius: 5px;
            text-decoration: none;
        }

        #receipt{
            box-shadow: 5px 10px 15px rgba(0,0,0,0.5);
            padding: 20px;
            margin: 30px auto 0 auto;
            width: 900px;
            background: #FFF;
            overflow: hidden;

        }

       
.img-logo{
            max-width: 12%;
            margin-right: 2px;
}
.ident {
    display: flex;
    align-items: center;
    width: 100%;
}
.nama-sekolah {
    text-align: left;
    margin-left: 80px; 
    /* Atur teks agar diletakkan di sebelah kiri */
}
.hr {
    border-top: 2px solid #000000;
    margin: 5px 0 5px 0;
    width: 200%;
}

.ul {
    padding: 0;
    margin: 5px 0;
}

h3 {
    margin: 5px 0; /* Atur margin atas dan bawah h3 */
}

.alamat {
    text-align: right;
    float: right;
    margin-left: auto; /* Atur margin agar berada di pojok kanan dari .nama-sekolah */
}



p {
    color: #000000;
    font-size: 12px;
}

.container{
    display: flex;
    align-items: center;
    width: 100%;
}

.no{
    margin-top: 50px;
    line-height: 0.4;

}

.no>p{
    font-size: 15px;
}



.no-right{
    
   margin-top: -100px;
}

.no-right>p{
    font-size: 15px;
    margin-left: 75%;
}

.no-right>ul{
    list-style-type: none;
    float: left;
    margin-left: 65%;
}

.pesan{
    margin-top: 50px;
    float: left;
}

 .pesan>p{
    font-size: 15px;
 }


    </style>
</head>
<body>
<div id="button-wrap">
        <a href="{{ route('surat.home') }}" class="btn-back">Kembali</a>
        <a href="{{ route('surat.download', $surat['id']) }}" class="btn-print">Cetak (.pdf)</a>
    </div>
    <div class="" id="receipt">
        <header>
            <div class="ident">
                <img class="img-logo" src="{{ asset('img\wikrama-logo (1).png') }}" alt="">
                <div class="nama-sekolah">
                <h3>SMK Wikrama Bogor</h3>
                <hr class="hr" >
                <ul style="list-style-type: none" class="ul">
                    <li>Manajemen Dan Bisnis</li>
                    <li>Teknik Informasi Dan Komunikasi</li>
                    <li>Pemasaran</li>
                </ul>
                </div>

                <div class="alamat">
                   
                    <p>Jl. Raya Wangun Kel. Sindangsari Bogor</p>
                    <p>Telp/Faks: (0251) 8242411</p>
                    <p>e-mail: prohumasi@smkwikrama.sch.id</p>
                    <p>website: www.smkwikrama.sch.id</p>
                </div>
            </div>
            <hr style="border-top: 3px solid #000000;">
        </header>

        <div class="container">
            <div class="no">
                
                    
               
                <p>No: <b>
                    @if($surat->first()->letter_type_id)
                        {{ $surat->first()->letterType->letter_code }}/SMK Wikrama/{{ $surat->first()->created_at->format('Y') }}
                    @else
                        No notulis assigned
                    @endif
                </b></p>
                
                <p>Hal: <b> {{ $surat->letter_perihal }}</b></p>
                
           
            </div>
        </div>
        
   

    <div class="no-right">
        <p>{{ $surat['created_at']->format('d F Y') }}</p>
        <ul>
            <li>Kepada</li>
            
            <li>Yth.Bapak/Ibu Terlampir</li>
            <li>di Tempat</li>
        </ul>
    </div>

    <div class="pesan">
        <p>Assalamualaikum Wr.Wb.</p>
        <p style="text-align: left"> {!! $surat['content'] !!}</p>
       <br>
       <p>Peserta: </p>
       <ol ><li>{{ implode(', ', array_column($surat->recipients, 'name')) }}</li></ol>
    </div>

    <div class="no-right">
        <ul>
           
            
            <li>Hormat Kami</li>
            <li>Kepala SMK Wikrama Bogor</li>
            <br>
            <br>
            <br>
            <p>(..................................................................)</p>
        </ul>
    </div>

    </div>
</body>
</html>