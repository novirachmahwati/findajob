<!DOCTYPE html>
<html>
<head>
    <title>Findajob</title>
</head>
<body>
    <h1>Halo, {{ $mailData['nama'] }}</h1>
    {{-- <p>{{ $mailData['body'] }}</p> --}}
  
    <p>Terdapat pelamar baru, untuk lowongan {{ $mailData['nama_lowongan'] }}, segera cek aplikasi Findajob Anda.</p>
     
    <p>Terimakasih</p>
</body>
</html>