
<head>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/reservation.min.css')}}">


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <style>
        
        .spacer {
            height: 10vh;
        }

        .reservation-form .btn-res-form {
            width: 100%;
            background-color: #589442;
        }
        .datepicker-date-display {

    background-color: #589442;

}
.timepicker-digital-display {
    -webkit-box-flex: 1;
    -webkit-flex: 1 auto;
    -ms-flex: 1 auto;
    flex: 1 auto;
    background-color: #589442;
    padding: 10px;
    font-weight: 300;
}
.timepicker-tick:focus,.timepicker-tick:active,.timepicker-tick:hover,.timepicker-tick::selection{
    background-color: #000;
}


.timepicker-canvas line {
    stroke: #589442;
    stroke-width: 4;
    stroke-linecap: round;
}
.timepicker-canvas-bg {
    stroke: none;
    fill: #589442;
}
.timepicker-canvas-bearing {
    stroke: none;
    fill: #589442;
}
.datepicker-table td.is-selected {
    background-color: #589442;
    color: #fff;
}
.btn-flat{
    color: #589442;

}
.dropdown-content li>a, .dropdown-content li>span {
    color: #589442;
   
}
.modal{
    height:auto;
}
.text-primary {
    color: #fff !important;
}
.input-field1 .prefix {
    position: absolute;
    width: 3rem;
    font-size: 2rem;
    color:#000;
    -webkit-transition: color .2s;
    transition: color .2s;
    top: 0.5rem;
}
.input-field1{
    position:relative;
}
.prefix{
    margin: 0 0.75rem;
}
.timepicker1,.datepicker1{
    margin-left: 3rem !important;
    width: calc(100% - 3rem) !important;
}
.row .col{
    float:left;
}
    h5 {
    font-size: 18px;
    line-height: 30px;
    color: #151a33;
}
    </style>
</head><body>
    <!--  reservation-card  -->
    <form action="{{url('/reservation')}}" method="POST" class="personalinfo-form" style="    margin: -30px;">
        @csrf
        @auth

        <input type="hidden" name="shop_id" value="{{$shop->id}}">
        <input type="hidden" name="email" value="{{ auth()->user()->email }}"> 
        <input type="hidden" name="first_name" value="{{ auth()->user()->first_name }}">
        <input type="hidden" name="last_name" value="{{ auth()->user()->last_name }}"> 
        <input type="hidden" name="mobile" value="{{ auth()->user()->mobile }}"> 
@endauth

    <div class="reservation-form container">
        <div class="row" style="width: 100%;" >
            <div class="col z-depth-2 py-3" style="    background: #fff;
">
                <div class="input-field1 col col-md-3 " style="display: inline-block;">
                    <i class="material-icons prefix">date_range</i>
                    <input type="text" class="datepicker datepicker1" name="date" placeholder="Date">
                </div>
                <div class="input-field1 col col-md-3 px-3" style="display: inline-block;">
                    <i class="material-icons prefix">access_time</i>
                    <input type="text" class="timepicker timepicker1" name="time" placeholder="Select Time">
                </div>

                <div class="input-field1 col col-md-3 px-3" style="display: inline-block;">
                    <select name="guests">
                        <option value="" disabled selected>Guests</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>

                <div class="input-field1 col col-md-3 px-3 " style="display: inline-block;">
                    <button class="btn waves-effect waves-light btn-large btn-res-form" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form>




    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var dElems = document.querySelectorAll('.datepicker');
            var dInstances = M.Datepicker.init(dElems, { autoClose: true });
            var sElems = document.querySelectorAll('select');
            var sInstances = M.FormSelect.init(sElems, {
                dropdownOptions: {
                    1: 1,
                    2: 2,
                    3: 3
                }
            });
        });


        document.addEventListener('DOMContentLoaded', function () {

        });
        document.addEventListener('DOMContentLoaded', function () {
            var timepickerElems = document.querySelectorAll('.timepicker');
            var options = {
                twelveHour: false // change to true if you want to use 12-hour format
            };
            var instances = M.Timepicker.init(timepickerElems, options);
        });
    </script>
</body>
