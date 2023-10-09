<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .container {
      padding-top: 20px;
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>



<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
  <div id="top" class="container-fluid">
    <a class="navbar-brand" href=".top">The Goat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href=" {{ route('game.edit.view') }}" >Games</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href=" {{ route('team.edit.view') }} ">All Teams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('country.edit.view')}}">All countries</a>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Games
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"> 2 Odds</a></li>
            <li><a class="dropdown-item" href="#"> 8 Odds </a></li>
           
          </ul>
        </li>
        <li> <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="inline">Logout</button>
        </form></li>
      </ul>
    </div>
  </div>
</nav>

<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card mt-5">
      <div class="card-body">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" id="league-tab" data-toggle="tab" href="#league">Countries</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="countries-tab" data-toggle="tab" href="#countries">Leagues</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="games-tab" data-toggle="tab" href="#predictions">Predictions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="countries-tab" data-toggle="tab" href="#teams">Teams</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="countries-tab" data-toggle="tab" href="#games">Games</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
    <div class="tab-content">
      <div class="tab-pane fade show active" id="league">
        <h3 class="text-center">Add Country</h3>
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action=" {{ route('create.country') }} " method="post">
            @csrf
                <div class="form-group">
                   <!-- Country names and Country Code -->
<select class="form-control" id="name" name="name">
    <option value="">country</option>
    <option value="AF">Afghanistan</option>
    <option value="AX">Aland Islands</option>
    <option value="AL">Albania</option>
    <option value="DZ">Algeria</option>
    <option value="AS">American Samoa</option>
    <option value="AD">Andorra</option>
    <option value="AO">Angola</option>
    <option value="AI">Anguilla</option>
    <option value="AQ">Antarctica</option>
    <option value="AG">Antigua and Barbuda</option>
    <option value="AR">Argentina</option>
    <option value="AM">Armenia</option>
    <option value="AW">Aruba</option>
    <option value="AU">Australia</option>
    <option value="AT">Austria</option>
    <option value="AZ">Azerbaijan</option>
    <option value="BS">Bahamas</option>
    <option value="BH">Bahrain</option>
    <option value="BD">Bangladesh</option>
    <option value="BB">Barbados</option>
    <option value="BY">Belarus</option>
    <option value="BE">Belgium</option>
    <option value="BZ">Belize</option>
    <option value="BJ">Benin</option>
    <option value="BM">Bermuda</option>
    <option value="BT">Bhutan</option>
    <option value="BO">Bolivia</option>
    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
    <option value="BA">Bosnia and Herzegovina</option>
    <option value="BW">Botswana</option>
    <option value="BV">Bouvet Island</option>
    <option value="BR">Brazil</option>
    <option value="IO">British Indian Ocean Territory</option>
    <option value="BN">Brunei Darussalam</option>
    <option value="BG">Bulgaria</option>
    <option value="BF">Burkina Faso</option>
    <option value="BI">Burundi</option>
    <option value="KH">Cambodia</option>
    <option value="CM">Cameroon</option>
    <option value="CA">Canada</option>
    <option value="CV">Cape Verde</option>
    <option value="KY">Cayman Islands</option>
    <option value="CF">Central African Republic</option>
    <option value="TD">Chad</option>
    <option value="CL">Chile</option>
    <option value="CN">China</option>
    <option value="CX">Christmas Island</option>
    <option value="CC">Cocos (Keeling) Islands</option>
    <option value="CO">Colombia</option>
    <option value="KM">Comoros</option>
    <option value="CG">Congo</option>
    <option value="CD">Congo, Democratic Republic of the Congo</option>
    <option value="CK">Cook Islands</option>
    <option value="CR">Costa Rica</option>
    <option value="CI">Cote D'Ivoire</option>
    <option value="HR">Croatia</option>
    <option value="CU">Cuba</option>
    <option value="CW">Curacao</option>
    <option value="CY">Cyprus</option>
    <option value="CZ">Czech Republic</option>
    <option value="DK">Denmark</option>
    <option value="DJ">Djibouti</option>
    <option value="DM">Dominica</option>
    <option value="DO">Dominican Republic</option>
    <option value="EC">Ecuador</option>
    <option value="EG">Egypt</option>
    <option value="SV">El Salvador</option>
    <option value="GQ">Equatorial Guinea</option>
    <option value="ER">Eritrea</option>
    <option value="EE">Estonia</option>
    <option value="ET">Ethiopia</option>
    <option value="FK">Falkland Islands (Malvinas)</option>
    <option value="FO">Faroe Islands</option>
    <option value="FJ">Fiji</option>
    <option value="FI">Finland</option>
    <option value="FR">France</option>
    <option value="GF">French Guiana</option>
    <option value="PF">French Polynesia</option>
    <option value="TF">French Southern Territories</option>
    <option value="GA">Gabon</option>
    <option value="GM">Gambia</option>
    <option value="GE">Georgia</option>
    <option value="DE">Germany</option>
    <option value="GH">Ghana</option>
    <option value="GI">Gibraltar</option>
    <option value="GR">Greece</option>
    <option value="GL">Greenland</option>
    <option value="GD">Grenada</option>
    <option value="GP">Guadeloupe</option>
    <option value="GU">Guam</option>
    <option value="GT">Guatemala</option>
    <option value="GG">Guernsey</option>
    <option value="GN">Guinea</option>
    <option value="GW">Guinea-Bissau</option>
    <option value="GY">Guyana</option>
    <option value="HT">Haiti</option>
    <option value="HM">Heard Island and Mcdonald Islands</option>
    <option value="VA">Holy See (Vatican City State)</option>
    <option value="HN">Honduras</option>
    <option value="HK">Hong Kong</option>
    <option value="HU">Hungary</option>
    <option value="IS">Iceland</option>
    <option value="IN">India</option>
    <option value="ID">Indonesia</option>
    <option value="IR">Iran, Islamic Republic of</option>
    <option value="IQ">Iraq</option>
    <option value="IE">Ireland</option>
    <option value="IM">Isle of Man</option>
    <option value="IL">Israel</option>
    <option value="IT">Italy</option>
    <option value="JM">Jamaica</option>
    <option value="JP">Japan</option>
    <option value="JE">Jersey</option>
    <option value="JO">Jordan</option>
    <option value="KZ">Kazakhstan</option>
    <option value="KE">Kenya</option>
    <option value="KI">Kiribati</option>
    <option value="KP">Korea, Democratic People's Republic of</option>
    <option value="KR">Korea, Republic of</option>
    <option value="XK">Kosovo</option>
    <option value="KW">Kuwait</option>
    <option value="KG">Kyrgyzstan</option>
    <option value="LA">Lao People's Democratic Republic</option>
    <option value="LV">Latvia</option>
    <option value="LB">Lebanon</option>
    <option value="LS">Lesotho</option>
    <option value="LR">Liberia</option>
    <option value="LY">Libyan Arab Jamahiriya</option>
    <option value="LI">Liechtenstein</option>
    <option value="LT">Lithuania</option>
    <option value="LU">Luxembourg</option>
    <option value="MO">Macao</option>
    <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
    <option value="MG">Madagascar</option>
    <option value="MW">Malawi</option>
    <option value="MY">Malaysia</option>
    <option value="MV">Maldives</option>
    <option value="ML">Mali</option>
    <option value="MT">Malta</option>
    <option value="MH">Marshall Islands</option>
    <option value="MQ">Martinique</option>
    <option value="MR">Mauritania</option>
    <option value="MU">Mauritius</option>
    <option value="YT">Mayotte</option>
    <option value="MX">Mexico</option>
    <option value="FM">Micronesia, Federated States of</option>
    <option value="MD">Moldova, Republic of</option>
    <option value="MC">Monaco</option>
    <option value="MN">Mongolia</option>
    <option value="ME">Montenegro</option>
    <option value="MS">Montserrat</option>
    <option value="MA">Morocco</option>
    <option value="MZ">Mozambique</option>
    <option value="MM">Myanmar</option>
    <option value="NA">Namibia</option>
    <option value="NR">Nauru</option>
    <option value="NP">Nepal</option>
    <option value="NL">Netherlands</option>
    <option value="AN">Netherlands Antilles</option>
    <option value="NC">New Caledonia</option>
    <option value="NZ">New Zealand</option>
    <option value="NI">Nicaragua</option>
    <option value="NE">Niger</option>
    <option value="NG">Nigeria</option>
    <option value="NU">Niue</option>
    <option value="NF">Norfolk Island</option>
    <option value="MP">Northern Mariana Islands</option>
    <option value="NO">Norway</option>
    <option value="OM">Oman</option>
    <option value="PK">Pakistan</option>
    <option value="PW">Palau</option>
    <option value="PS">Palestinian Territory, Occupied</option>
    <option value="PA">Panama</option>
    <option value="PG">Papua New Guinea</option>
    <option value="PY">Paraguay</option>
    <option value="PE">Peru</option>
    <option value="PH">Philippines</option>
    <option value="PN">Pitcairn</option>
    <option value="PL">Poland</option>
    <option value="PT">Portugal</option>
    <option value="PR">Puerto Rico</option>
    <option value="QA">Qatar</option>
    <option value="RE">Reunion</option>
    <option value="RO">Romania</option>
    <option value="RU">Russian Federation</option>
    <option value="RW">Rwanda</option>
    <option value="BL">Saint Barthelemy</option>
    <option value="SH">Saint Helena</option>
    <option value="KN">Saint Kitts and Nevis</option>
    <option value="LC">Saint Lucia</option>
    <option value="MF">Saint Martin</option>
    <option value="PM">Saint Pierre and Miquelon</option>
    <option value="VC">Saint Vincent and the Grenadines</option>
    <option value="WS">Samoa</option>
    <option value="SM">San Marino</option>
    <option value="ST">Sao Tome and Principe</option>
    <option value="SA">Saudi Arabia</option>
    <option value="SN">Senegal</option>
    <option value="RS">Serbia</option>
    <option value="CS">Serbia and Montenegro</option>
    <option value="SC">Seychelles</option>
    <option value="SL">Sierra Leone</option>
    <option value="SG">Singapore</option>
    <option value="SX">Sint Maarten</option>
    <option value="SK">Slovakia</option>
    <option value="SI">Slovenia</option>
    <option value="SB">Solomon Islands</option>
    <option value="SO">Somalia</option>
    <option value="ZA">South Africa</option>
    <option value="GS">South Georgia and the South Sandwich Islands</option>
    <option value="SS">South Sudan</option>
    <option value="ES">Spain</option>
    <option value="LK">Sri Lanka</option>
    <option value="SD">Sudan</option>
    <option value="SR">Suriname</option>
    <option value="SJ">Svalbard and Jan Mayen</option>
    <option value="SZ">Swaziland</option>
    <option value="SE">Sweden</option>
    <option value="CH">Switzerland</option>
    <option value="SY">Syrian Arab Republic</option>
    <option value="TW">Taiwan, Province of China</option>
    <option value="TJ">Tajikistan</option>
    <option value="TZ">Tanzania, United Republic of</option>
    <option value="TH">Thailand</option>
    <option value="TL">Timor-Leste</option>
    <option value="TG">Togo</option>
    <option value="TK">Tokelau</option>
    <option value="TO">Tonga</option>
    <option value="TT">Trinidad and Tobago</option>
    <option value="TN">Tunisia</option>
    <option value="TR">Turkey</option>
    <option value="TM">Turkmenistan</option>
    <option value="TC">Turks and Caicos Islands</option>
    <option value="TV">Tuvalu</option>
    <option value="UG">Uganda</option>
    <option value="UA">Ukraine</option>
    <option value="AE">United Arab Emirates</option>
    <option value="GB">United Kingdom</option>
    <option value="US">United States</option>
    <option value="UM">United States Minor Outlying Islands</option>
    <option value="UY">Uruguay</option>
    <option value="UZ">Uzbekistan</option>
    <option value="VU">Vanuatu</option>
    <option value="VE">Venezuela</option>
    <option value="VN">Viet Nam</option>
    <option value="VG">Virgin Islands, British</option>
    <option value="VI">Virgin Islands, U.s.</option>
    <option value="WF">Wallis and Futuna</option>
    <option value="EH">Western Sahara</option>
    <option value="YE">Yemen</option>
    <option value="ZM">Zambia</option>
    <option value="ZW">Zimbabwe</option>
</select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
      </div>
      <div class="tab-pane fade" id="countries">
    <h3 class="text-center">Add Leagues</h3>
    <div class="d-flex justify-content-center">
        <form method="post" action=" {{ route('create.league') }} ">
          @csrf
            <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter League Name">
            </div>
            <div class="form-group">
            <select class="form-control" id="country" name="country">
                    <option>Select League Country</option>
                    <!-- Add more country options here -->
                    @foreach($countryNames as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" id="level" name="level">
                    <option>Select League Level</option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="tab-pane fade" id="predictions">
    <h3 class="text-center py-4">Predictions Form</h3>
    <div class="d-flex justify-content-center">
        <form action=" {{ route('create.prediction') }} " method="post">
          @csrf
            <div class="form-group" id="prediction">
                <input type="text" class="form-control" name="prediction" id="prediction" placeholder="Add predictions">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
</div>
<div class="tab-pane fade" id="teams">
  <h3 class="text-center py-4">Add Teams</h3>
  <div class="d-flex justify-content-center">
    <form action=" {{ route('create.teams') }} " method="post">
      @csrf
      <div class="form-group">
        <select class="form-control" id="league_id" name="league_id">
          <option>Select League Country</option>
          <!-- Add more country options here -->
          @foreach($leagues as $league)
            <option value="{{$league->id}}">{{$league->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group" id="team">
          <input type="text" class="input-with-icon" name="name" id="name" placeholder="Add team">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>


<div class="tab-pane fade" id="teams">
  <h3 class="text-center py-4">Add Teams</h3>
  <div class="d-flex justify-content-center">
    <form action=" {{ route('create.teams') }} " method="post">
      @csrf
      <div class="form-group">
        <select class="form-control" id="league_id" name="league_id">
          <option>Select League Country</option>
          <!-- Add more country options here -->
          @foreach($leagues as $league)
            <option value="{{$league->id}}">{{$league->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group" id="team">
          <input type="text" class="input-with-icon" name="name" id="name" placeholder="Add team">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>






  <div class="tab-pane fade" id="games">
    <h3 class="text-center py-4">Add Games</h3>
    <div class="d-flex justify-content-center">
        <form action="{{ route('create.games') }}" method="POST">
            @csrf

            <div class="form-group">
                        <select class="form-control" name="home_team">
                            <option>Select Home Team</option>
                            <!-- Add more team options here -->
                            @foreach($teams as $team)
                                <option value="{{$team->id}}">{{$team->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <select class="form-control" name="away_team">
                            <option>Select Away Team</option>
                            <!-- Add more team options here -->
                            @foreach($teams as $team)
                                <option value="{{$team->id}}">{{$team->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="time" class="form-control" name="game_time" placeholder="Input game time">
                    </div>

                    <div class="form-group">
                        <input type="date" class="form-control" name="game_date" placeholder="Game date">
                    </div>

                      

                      
                        

                    <div class="form-group">
                        <select class="form-control" name="prediction">
                            <option>Select Game Prediction</option>
                            <!-- Add more prediction options here -->
                            @foreach($predictions as $prediction)
                                <option value="{{$prediction->id}}">{{$prediction->prediction}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <textarea name="description" class="form-control" rows="3" placeholder="Write a description about the game"></textarea>
                    </div>



                       
                        <div class="form-group">
                        <input type="number" class="form-control" name="odd" min="1" step="0.1" placeholder="Odd of the game">
                        </div>

                        <div class="form-group">
                            <!-- <label for="game_number">Game Number</label>
                            <input type="text" class="form-control" id="game_number" name="game_number" placeholder="game_number">
                          
                          -->
                          <input type="number" name="game_number" placeholder="{{ $greatestGameNumber }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



       
      </div>
      
    </div>
  </div>
</body>
</html>