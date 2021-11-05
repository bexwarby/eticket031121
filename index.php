<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>E-Ticket</title>
</head>
<body>

    <?php
        // imports
        include __DIR__."/menu.php";
        // call menu function
        show_menu();
    ?>

    <!-- Page title -->
    <h3 class="d-block p-2 bg-light text-dark text-center">Make your booking here!</h3>
    <div class="d-flex justify-content-center bg-dark text-light">
        <!-- Input new ticket request - updates on ticket.php -->
        <form action="ticket.php" method="POST">
            <!-- First row -->
            <div class="form-row">
                <!-- Child or adult -->
                <div class="form-group">
                    <label for="choice">Cinema or Theatre?</label>
                    <select class="form-control" name="choice" id="choice">
                        <option value="">--- Choose here ---</option>
                        <option value="Cinema">Cinema</option>
                        <option value="Theatre">Theatre</option>
                    </select>
                </div>
                <!-- Date required -->
                <!-- <div class="form-group">
                    <label for="dateRequest">Date required:</label>
                    <input type="date" class="form-control" name="dateRequest" id="dateRequest">
                </div> -->
                
                <div class="form-group">
                    <!-- Day -->
                    <label for="day">Please selecy the date:</label>
                    <select class="form-control" name="day" id="day">
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    <!-- Month -->
                    <select class="form-control" name="month" id="month">
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <!-- Year -->
                    <select class="form-control" name="year" id="year">
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2022">2022</option>
                    </select>
                </div>
                
            </div>

            <!-- Second row -->
            <div class="form-row">    
                
                <!-- Child or adult -->
                <div class="form-group">
                    <label for="age">Child or adult:</label>
                    <select class="form-control" name="age" id="age">
                        <option value="">--- Choose a category ---</option>
                        <option value="Child">Child (0 to 17)</option>
                        <option value="Adult">Adult</option>
                    </select>
                </div>
                <!-- Preferred seating -->
                <div class="form-group">
                    <label for="prefSeating">Preferred seating:</label>
                    <select class="form-control" name="prefSeating" id="prefSeating">
                        <option value="">--- Choose seating ---</option>
                        <option value="Front">Front</option>
                        <option value="Middle">Middle</option>
                        <option value="Back">Back</option>
                    </select>
                </div>
            </div>

            <!-- Cinema booking details -->
            <p><b>Cinema bookings:</b></p>
            <div class="form-row">  
                <!-- Film choice -->
                <div class="form-group">
                    <label for="chosenFilm">Film choice:</label>
                    <select class="form-control" name="chosenFilm" id="chosenFilm">
                        <option value="">--- Choose a film ---</option>
                        <option value="Chicken run">Chicken run</option>
                        <option value="Erin Brockovitch">Erin Brockovitch</option>
                        <option value="What Women Want">What Women Want</option>
                        <option value="Scary Movie">Scary Movie</option>
                        <option value="Mission Impossible">Mission Impossible</option>
                        <option value="El Dorado">El Dorado</option>
                    </select>
                </div>
                <!-- Location -->
                <div class="form-group">
                    <label for="location">Location:</label>
                    <select class="form-control" name="location" id="location">
                        <option value="">--- Choose a location ---</option>
                        <option value="London">London</option>
                        <option value="Bristol">Bristol</option>
                        <option value="Leeds">Leeds</option>
                        <option value="Newcastle">Newcastle</option>
                        <option value="Manchester">Manchester</option>
                    </select>
                </div>
                <!-- Preferred Time -->
                <div class="form-group">
                    <label for="time">Preferred time:</label>
                    <select class="form-control" name="time" id="time">
                        <option value="">--- Choose a time ---</option>
                        <option>10:00</option>
                        <option>12:00</option>
                        <option>15:00</option>
                        <option>18:00</option>
                        <option>21:00</option>
                        <option>Any (extra fee)</option>
                    </select>
                </div>
                
            </div>

            <!-- Theatre booking details -->
            <p><b>Theatre bookings:</b></p>
            <div class="form-row">                    
                <!-- Performance chosen -->
                <div class="form-group">
                    <label for="performance">Performance:</label>
                    <select class="form-control" name="performance" id="performance">
                        <option value="">--- Choose a performance ---</option>
                        <option>The Phantom of the Opera</option>
                        <option>Chicago</option>
                        <option>The Lion King</option>
                        <option>Cats</option>
                        <option>Mamma Mia</option>
                        <option>Fiddler on the roof</option>
                    </select>
                </div>
                <!-- Start time -->
                <!-- Preferred Time -->
                <div class="form-group">
                    <label for="timeStart">Preferred time:</label>
                    <select class="form-control" name="timeStart" id="timeStart">
                        <option value="">--- Choose a time ---</option>
                        <option>10:00</option>
                        <option>12:00</option>
                        <option>15:00</option>
                        <option>18:00</option>
                        <option>21:00</option>
                        <option>Any (extra fee)</option>
                    </select>
                </div>
            </div>
            
            <!-- Submit button -->
            <input type="submit" name="submit" value="Request ticket">
            <br>
    <br>
    <br>
    
    
        </form>

    </div>

</body>
</html>