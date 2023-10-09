<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<style>

body {
    background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
}

.logo {
  max-width: 50px;

}
</style>
</head>
<body>



<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" id="top">
  <div id="top" class="container-fluid">
    <a class="navbar-brand" href="#top">
      <img src="{{ asset('assets/THE GOAT LOGO.png') }}" class="d-block logo" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Main</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Games
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">2 Odds</a></li>
            <li><a class="dropdown-item" href="#">8 Odds</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>


<!-- {{ asset('assets/best.png') }} -->


<div id="carouselExampleSlidesOnly" class="carousel slide py-5" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('assets/epl4x.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item active">
      <img src="{{ asset('assets/bundesliga3x.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item active">
      <img src="{{ asset('assets/europa4x.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item active">
      <img src="{{ asset('assets/laliga4x.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item active">
      <img src="{{ asset('assets/ligue14x.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item active">
      <img src="{{ asset('assets/seriea4x.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item active">
      <img src="{{ asset('assets/ucl4x.jpg') }}" class="d-block w-100" alt="...">
    </div>

  </div>
</div>



<div class="table-responsive">
    <table class="table table2..0hover ">
    <thead>
        <tr>
            <th>Home Team</th>
            <th>Away Team</th>
            <th>Odd</th>
            <th>Date</th>
            <th>Prediction</th>
        </tr>

        @foreach($games as $game)
            <tr>
                <td>{{ $homeTeams->where('id', $game->home_team)->first()->name }}</td>
                <td>{{ $awayTeams->where('id', $game->away_team)->first()->name }}</td>
                <td>{{ $game->odd }}</td>
                <td>{{ $date[0] }}</td>
                <td>{{ $pred->where('id', $game->prediction)->first()->prediction }}</td>
                <td>
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="gameDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      Games
    </button>
    <ul class="dropdown-menu dropdown-menu-end w-100" aria-labelledby="gameDropdown">
      <li>
        <a class="dropdown-item" href="#">
          <p id="game-description" class="mb-0 text-wrap">{{ $game->description }}</p>
        </a>
      </li>
    
  </div>
</td>
</td>
</td>

</td>

            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center align-items-center my-0">
   <h1 class="bg-white w-2">{{$totalOdd}}</h1>
</div>
</div>



<div class="card-group my-4">
  <div class="card">
    <img src="{{ asset('assets/exp1.jpg') }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Alula Hailu</h5>
      <p class="card-text">የስፖርት ነክ መረጃዎች ግንዛቤዎችን በማውጣት ረገድ ልምድ ያለው የመረጃ ተንታኝ ሲሆን። ትክክለኛ ትንበያዎችን ለማመንጨት የስታቲስቲክስ ቴክኒኮችን እና የመረጃ ማምረቻዎችን ይጠቀማል። ወቅታዊ ትንታኔዎችን ለማረጋገጥ የስፖርት ዜናዎችን እና የኢንዱስትሪ እድገቶችን ይከታተላል። የተጠቃሚን ልምድ ለማሻሻል እና ጠቃሚ ግንዛቤዎችን ለማቅረብ ከ ሌሎች ቡድኖች ጋር ይሰራል፡፡</p>
    </div>
    <div class="card-footer">
      <small class="text-body-secondary">Data Analyst</small>
    </div>
  </div>
  <div class="card">
    <img src="{{ asset('assets/exp3.jpg') }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Mahlet Kassahun</h5>
      <p class="card-text">ማህሌት ካሳሁን በGoat ግንባር ቀደም ውርርድ ትንበያ ድህረ ገጽ ላይ Odd Analyst ነች። በመረጃ ትንተና ላይ ባላት እውቀት እና ለተዛማጅ ዐይን ያለው መስክ ትክክለኛ እና አስተማማኝ ትንበያዎችን ለማቅረብ ቁጥሮችን በመሰባበር እና የተደበቁ ቁልፎችን በመክፈት ላይ ያተኮረች ሲሆን ስታቲስቲካዊ ሞዴሊንግ፣ የማሽን መማር እና የኢንዱስትሪ እውቀትን በመጠቀም ልዩ የውርርድ እድሎችን ትለያለች እና ተጠቃሚዎች በመረጃ የተደገፉ የውርርድ ውሳኔዎችን እንዲያደርጉ ለማበረታታት ግልፅ እና አጭር ትንታኔ ትሰጣለች። Goatን በመቀላቀል ከ ማህሌት ጋር  የማሸነፍ አቅምዎን ያሳድጉ።</p>
    </div>
    <div class="card-footer">
      <small class="text-body-secondary">Odd Analyst</small>
    </div>
  </div>
  <div class="card">
    <img src="{{ asset('assets/exp2.jpg') }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Surafel Kassahun</h5>
      <p class="card-text">ልምድ ያለው የግጥሚያ ተንታኝ ሲሆን ለዋና ውርርድ በትክክለኛ ትንበያዎች ላይ ያተኮረ ባለሙያ ነዉ። የግጥሚያ ውጤቶችን የሚነኩ ቁልፍ ነገሮችን በመለየት ስታቲስቲካዊ ትንታኔን እና የመረጃ ምንጮችን ይጠቀማል። ከስፖርት ዜናዎች፣የቡድን ተለዋዋጭነት እና አዳዲስ አዝማሚያዎችን እያጤነ ይቆያል። ለተጠቃሚ ምቹ ይዘት እና ውርርድ ምክሮችን ለማምረት ከሌሎች ባለሙያዎች ጋር ይተባበራል። የውርርድ ልምድን ያሻሽላል እና ተጠቃሚዎችን ጠቃሚ ግንዛቤዎችን ያጎናጽፋል።</p>
    </div>
    <div class="card-footer">
      <small class="text-body-secondary">Match Analyst</small>
    </div>
  </div>
</div>


<div class="bg-white py-4">
    <p class="text-primary fw-bold fs-5 my-2">በሀገራችን ብሎም በአሀጉራችን ምርጡ የጫወታ ጥቆማ ገፅ</p>
    <p class="fs-7">
      ቤቲንግ በተለይም ስፖርታዊ ዉርርድ የ ሂወታችን አንድ አካል ከሆነ  ሰነባብቱዋል፡፡ ይህ ካምፓኒም የተቋቋመበትም ዋነኛ ምከንያት ይህን ሰፖረታዊ ዉርርድ ወደ  ኢንቨስትመንት በመቀየር በየዕለቱ በተለይም በሳምቱ መጨረሻ የ ሀገራት የ ሊግ ጨዋታዎችን፣ የ አሃጉራት የክለቦች ዉድድርን እና የ አሃጉራት የ ሀገራት ጨዋታዎችን  ደህንነቱ በተረጋገጠ እና ከ 85% በላይ እርግጠኝነት ያላቸዉን የ ስፖርታዊ ዉርርዶችን በመልቀቅ እናንተን ደንበኞቻችንን የትርፍ ተካፋይ ማረግ ነዉ፡፡
    </p>
<p class="text-primary fw-bold fs-5 my-2">እርገጠኛነት</p>
<p class="fs-7">
The Goat በአሁን ሰአት ከ አለማችን እርግጠኛ ከሚባሉ ሳይቶች አንዱ ሲሆን ይህም ወደ 85% እርግጠኝነት ያለዉ ሲሆን ይህንም ከ አለማችን ዉርርዶችን በማሸነፍ ቀዳሚ ያደርገዋል፡፡ ይሄንም የኛን የ ዉርርድ ተንባዮች እና የጫወታ ተንታኞች ቁጥር አንድ ያረጋቸዋል፡፡
</p>
<p class="text-primary fw-bold fs-5 my-2">ታማኝነት</p>
<p class="fs-7">
The Goat ማንኛውም ሰው የሚያሸንፍበት አስተማማኝ የእግር ኳስ መድረክ ነው። እኛ ዋጋ በመስጠት እና የስርዓቶቻችንን ትርፋማነት በማሳደግ ላይ እናተኩራለን። በእኛ ከፍተኛ ጥራት ባለው vip ትንበያዎች 70% ትርፍ እንደሚያገኙ እርግጠኛ ነዎት። የእኛ ልዩ ችሎታዎች የሚከተሉትን ያካትታሉ:

<ul>
  <li>
    <p class="fs-10">
    1.3-1.5 odds ይህ አጨዋወት በ አብዛኛዉ ጊዜ በ ደንበኞቻችን በጠቅላይ ጠቅላይ አጨዋወት የሚተገበር ሲሆን አደጋዉ ዝቅ ያለ ሲሆን ከፍ ባለ ገንዘብ ወይም አጨዋወት የሚዘወተር ነዉ፡፡
    </p>
  </li>
  <li>
    <p class="fs-10">
    3 ዕድሎች የባንክ ባለሙያ
    </p>
  </li>
  <li>
    <p class="fs-10">
    ጥሩ 5 - 10 የዕድል ክምችት
    </p>
  </li>
  <li>
    <p class="fs-10">
    ጎል ከ1.5፣ 2.5፣ 3.5፣ 4.5፣ ወይም 5.5 በታች የሆኑ
    </p>
  </li>
  <li>
    <p class="fs-10">
    ሁለቱም ቡድኖች ጎል ለማስቆጠር (btts/gg)
    </p>
  </li>
  <li>
    <p class="fs-10">
    ድርብ ዕድል እና DNBS
    </p>
  </li>
  <li>
    <p class="fs-10">
    አቻ እና ትክክለኛ የጫወታ ዉጤት 
    </p>
  </li>
</ul>
ለተጠቃሚዎቻችን ደስታን ለመጨመር እና ለጨዋታው ፍቅር ሲባል በየሳምንቱ መጨረሻ በነጻ ምርጥ የእግር ኳስ ውርርድ ጥቆማ የምናዘጋጅበት ክፍል አለን ።እንዲሁም ይህንን መድረክ በመጠቀም የእግር ኳስ ግጥሚያዎችን በትክክል መተንበይ እና ማወቅ ይችላሉ። የዛሬውን የጨዋታ አሸናፊ በትክክል ይምረጡ።

TheGoat ትክክለኛ የስፖርት ትንበያ ጣቢያ እና የእግር ኳስ ግጥሚያዎችን በትክክል የሚተነብይ እጅግ በጣም አስተማማኝ የእግር ኳስ ትንበያ ጣቢያ ነው። ውርርድን በተሻለ ሁኔታ እንዲረዱ ልንረዳዎ እንሞክራለን። ይህ በየቀኑ የእግር ኳስ ትንበያዎችን የሚፈትሹበት እና እንዲሁም በስፖርት ውርርድ ብሎግ ላይ ከምናተማቸው የስፖርት ዜና ጠቃሚ መረጃዎችን የምታነቡበት ድህረ ገጽ ነው።

</p>

<p class="text-primary fw-bold fw-bold fs-5 my-2">በእርግጥም ትክክለኛ የ ጫዋታ ትንበያ ገፅ</p>
<p class="fs-7">
በአሁን ሰአት ብዙ አጭበርባሪ እና አሳሳች የ ጫወታ ተንባዮች በቅርብ እየተበራከቱ የመጡ ሲሆን የዉሸት እና አሳሳች የጫወታ ትኬቶችን ፖስት በማረግ በዙ ክፍያን በመጠየቅ ሰዎችን በማሳሳት እና በማጭበርበር ብዙ ገንዘብ ተጫዋቾች እንዲያጡ ሲያደርጉ ተመልክተናል፡፡ The Goat ግን ከነዚ አጭበርባሪዎች በተቃራኒ በኩል የሚሰራ ድርጅት ሲሆን በምንሰጣቸዉ ግልጋሎቶችም ምንም አይነት ቅሬታ ካሎት ቋሚ አድራሻ እና መገኛ ስላለን በዛ መጠየቅ የሚቻል መሆኑን እናሳዉቃለን፡፡
</p>
<p class="text-primary fw-bold fs-5 my-2">በየትኛዉም ክልል እና ቦታ መገኘት</p>
<p class="fs-7">
The Goat በአሁን ሰአት በድረ-ገፃችን በመግባት ጊዜ ቦታ ሳይገድባቹ የፈለጉትን የጫወታ ትንበያዎችን በቀላሉ ሌላ መተግበሪያ መጠቀም ሳያስፈልጎት እንዲጠቀሙ ማስቻሉ ለየት እንዲል ያስችለዋል
</p>
<p class="text-primary fw-bold fs-5 my-2">ለማሸነፎ ዋስትና የሚሰጥ</p>

<p>በአለም ላይ ካሉ ምርጥ ትንበያ ጣቢያዎች አንዱ እንደመሆናችን መጠን ገንዘብዎን ወደ ኪስዎ የሚያስገባ ትክክለኛ የእግር ኳስ ትንበያ ሲሆን ገንዘቦትን በኪሶት እንዲያከማቹ ለመርዳት ቆርጠን ተነስተናል። የሚያስፈልጎ ጥሩ የገንዘብ አያያዝ ስልቶችን ማዳበር እና የአሸናፊነት ሽልማቶችዎን በየጊዜው በአረንጓዴ ትንበያዎቻችን ማሳደግ ነው። በጣም ልምድ ካላቸው የትንበያ ባለሙያዎች ጋር ያለዎትን ልምድ ያሻሽሉ ባለሙያዎቻችን በየቀኑ ምርጥ የእግር ኳስ ምክሮች ምርጫ ወደ ድል እንዲመራዎት ያድርጉ! እንደ ከፍተኛ ትንበያ ጣቢያ፣ በአለም ላይ ባሉ ምርጥ የእግር ኳስ ትንበያዎች የተሞላ ቡድን አለን እና እንደ ጥራት መተንበያ ጣቢያ ለዛሬ፣ ነገ እና ቅዳሜና እሁድ አስተማማኝ የዕለታዊ የባንክ ባለሙያ ምክሮችን እናቀርባለን። የኛ ትንበያዎች የንስር አይኖች ባሏቸዉ ተንባዮች በጫወታው ይገኛሉ፣ባንክዎን ለመጨመር የሚረዱ ጠቃሚ ውርርዶችን ለማረጋገጥ በብልህነት በመስራት ላይ ነን። የእኛ ዘዴዎች በበቂ ሁኔታ ተፈትነው ከፍተኛ ትርፍ ማስገኘት እንደሚችሉ ተረጋግጧል። ከእኛ ጋር ይቆዩ፣ መልካም እድል ይደሰቱ፣ በአለም ላይ ያለው ምርጥ የእግር ኳስ ትንበያ ጣቢያ እርስዎን ሽፋን አድርጎታል።</div>
</p>


<div class="d-flex justify-content-center align-items-center my-0">
   <h1 class="bg-white w-2">Previous Game</h1>
</div>


<div class="table-responsive">
    <table class="table table2..0hover ">
    <thead>
        <tr>
            <th>Home Team</th>
            <th>Away Team</th>
            <th>Odd</th>
            <th>Date</th>
            <th>Prediction</th>
        </tr>

        @foreach($previousgame as $game)
        <tr>
        <td>{{ optional($homeTeams->where('id', $game->home_team)->first())->name }}</td>
        <td>{{ optional($awayTeams->where('id', $game->away_team)->first())->name }}</td>
        <td>{{ $game->odd }}</td>
        <td>{{ $date[0] }}</td>
        <td>{{ optional($pred->where('id', $game->prediction)->first())->prediction }}</td>
        
    
    <td>
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="gameDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      Result
    </button>
    <ul class="dropdown-menu dropdown-menu-end w-100" aria-labelledby="gameDropdown">
      <li>
        <a class="dropdown-item" href="#">
          <p id="game-description" class="mb-0 text-wrap">{{ $game->result }}</p>
        </a>
      </li>
    
  </div>
    </td>
        </tr>
</td>
</td>
</td>

</td>

            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center align-items-center my-0">
   <h1 class="bg-white w-2">{{ $totodd }}</h1>
</div>

  










<div class="card text-center">
  <div class="card-body bg-black">
    <p class="card-text"><img src="{{ asset('assets/18.png') }}" class="img-thumbnail" alt="..."></p>
    <p class="text-warning">በጥንቃቄ ይጫወቱ
 <span class="text-white">|</span> በሀላፊነት ይጫወቱ </p>
    <p class="text-white">© 2023 TheGoat የጫወታ እና የመረጃ ትንበያ ድርጅት</p>
    <p class="text-white">ሙሉ መብቱ በህግ የተከበረ</p>
  </div>
</div>


</body>
</html>