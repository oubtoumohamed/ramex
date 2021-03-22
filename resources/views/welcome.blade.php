<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">



            <div class="col-md-3">
                Regions : <select id="regions"> <option disabled="" >Selectioner la region </option> </select>
            </div>

            <div class="col-md-3">
                Semesters 1 : <select id="semesters"> 
                    <option value="s1">S 1</option> 
                    <option value="s2">S 2</option> 
                    <option value="s3">S 3</option> 
                    <option value="s4">S 4</option> 
                </select>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Semesters 2 : <select id="semesters2"> 
                    <option value="s1">S 1</option> 
                    <option value="s2">S 2</option> 
                    <option value="s3">S 3</option> 
                    <option value="s4">S 4</option> 
                </select>
            </div>

            <div class="col-md-3">
                Villes : <select id="villes"></select>
            </div>

            <div class="col-md-3">
                Students : <select id="students"></select>
            </div>



            <script>
                $(document).ready( function(){

                    $.get("{{ route('load_regions') }}", function(data, response){
                        
                        for (var i = 0; i < data.length; i++) {
                            $('#regions').append('<option value="'+data[i].id+'">'+data[i].intitule_fr+'</option>');
                        }
                    })

                    $('#regions,#semesters').change( function(){

                        var url_ = "{{ route('load_villes') }}";

                        var region_name = $('#regions').val();
                        var semester_name = $("#semesters").val();
                        var semester_name_2 = $("#semesters2").val();

                        $('#villes').html('');

                        var data_where = {
                            param_region : region_name,
                            param_semester_start : semester_name,
                            param_semester_end : semester_name_2,
                        };

                        $.get( url_ , data_where , function(data, response){
                            ///
                            for (var i = 0; i < data.length; i++) {
                                $('#villes').append('<option value="'+data[i].id+'">'+data[i].titre+'</option>');
                            }

                        })

                    });

                    /*-----------------------*/


                    $.get("{{ route('load_students') }}", function(data, response){
                        for (var i = 0; i < data.length; i++) {
                            $('#students').append('<option value="'+data[i].id+'">'+data[i].prenom_fr+' '+data[i].nom_fr+'</option>');
                        }
                    })


                });
            </script>







        </div>
    </body>
</html>
