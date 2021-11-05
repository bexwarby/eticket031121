<?php

    namespace Booking;
    
    abstract class Ticket {
        // Variables
        public $uniqueID;
        public $day;
        public $month;
        public $year;
        public $age;
        public $prefSeating;
        // functions to get and set attributes
        public function date() { 
            return "$this->day-$this->month-$this->year"; 
        }
        public function showPrice() { 
            // CINEMA PRICES
            if ($_POST["choice"] == "Cinema") {
                // 18 and above, specific time chosen
                if ($_POST["age"] == "Adult" && $_POST["time"] != "Any") {
                    return "13 €";
                // under 18, specific time chosen
                } elseif ($_POST["age"] == "Child" && $_POST["time"] != "Any")  {
                    return "5 €";
                // 18 and above, flexible ticket chosen
                } elseif ($_POST["age"] < "Adult" && $_POST["time"] == "Any") {
                    return "15 €";
                // under 18, flexible ticket chosen    
                } else {
                    return "8 €";
                };
            // THEATRE PRICES
            } else {
                // 18 and above, specific time chosen
                if ($_POST["age"] == "Adult" && $_POST["time"] != "Any") {
                    return "33 €";
                // under 18, specific time chosen
                } elseif ($_POST["age"] == "Child" && $_POST["time"] != "Any")  {
                    return "25 €";
                // 18 and above, flexible ticket chosen
                } elseif ($_POST["age"] == "Child" && $_POST["time"] == "Any") {
                    return "45 €";
                // under 18, flexible ticket chosen    
                } else {
                    return "35 €";
                };
            }
        }
        /* public function age() { return "$this->age"; }
        public function prefSeating() { return "$this->prefSeating"; } */
        
  
        
        // Constructor function
        public function __construct($day, $month, $year, $age, $prefSeating) {
            $this->day = $day;
            $this->month = $month;
            $this->year = $year;
            $this->age = $age;
            $this->prefSeating = $prefSeating;
            $this->uniqueID = $_POST["day"].$_POST["month"].rand(1,99);
        }  
    }

    class TicketCinema extends Ticket {
        
        // Variables
        public $chosenFilm;
        public $location;
        public $minAge;
        public $time;
        // functions to get and set attributes
        /* public function chosenFilm() { return "$this->chosenFilm"; }
        public function location() { return "$this->chosenFilm"; } */
        public function minAge($chosenFilm) { 
            // Add to DB different age categories per film
            if (
                $this->chosenFilm != "Chicken run" && 
                $this->chosenFilm != "El Dorado" && 
                $this->age == "Child"
                ) {
                    echo "Sorry, you are not old enough to watch this film";
            }
        }
        public function time() { return "$this->time"; }
        // Constructor function
        public function __construct($day, $month, $year, $age, $prefSeating, $chosenFilm, $location, $time) {
            parent::__construct($day, $month, $year, $age, $prefSeating);
            $this->chosenFilm = $chosenFilm;
            $this->location = $location;
            $this->minAge = 14;
            $this->time = $time;
        }  
    }

    class TicketTheatre extends Ticket {
        // Variables
        public $performance;
        public $timeStart;
        // functions to get and set attributes
        public function performance() { return "$this->performance"; }
        public function timeStart() { return "$this->timeStart"; }
        // Constructor function
        public function __construct($day, $month, $year, $age, $prefSeating, $performance, $timeStart) {
            parent::__construct($day, $month, $year, $age, $prefSeating);
            $this->performance = $performance;
            $this->timeStart = $timeStart;
        }  
    }

    function printTicket() { 

        /* Retrieve post ticket items from index.php
        */
        $choice = $_POST["choice"];
        $day = $_POST["day"];
        $month = $_POST["month"];
        $year = $_POST["year"];
        $age = $_POST["age"];
        $prefSeating = $_POST["prefSeating"];
        // cinema questions
        $chosenFilm = $_POST["chosenFilm"];
        $location = $_POST["location"];
        $time = $_POST["time"];
        // theatre questions
        $performance = $_POST["performance"];
        $timeStart = $_POST["timeStart"];


        /* 
        * Create new instance of cinema or theatre classes 
        * +
        * Print related ticket
        */
        if ($choice != "Cinema") {
            // create theatre instance
            $newTicket = new TicketTheatre (
                $day, 
                $month, 
                $year,
                $age, 
                $prefSeating,
                $performance, 
                $timeStart
            );
            // ticket print
            echo '<div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">'.$newTicket->performance.'</h5>
                    <h6 class="card-subtitle mb-2 text-muted">'
                        .$newTicket->day.'-'.$newTicket->month.'-'.$newTicket->year.'
                    </h6>
                    <p class="card-text">
                        '.$newTicket->age.' ticket </br>
                        Seat position: '.$newTicket->prefSeating.' </br>
                        Start time: '.$newTicket->timeStart.' </br>
                        Interval time: 60 minutes </br>
                        '.$newTicket->showPrice().' </br>
                        '.$newTicket->uniqueID.' </br>
                    </p>
                </div>
            </div>';
        } else {
            // create cinema instance
            $newTicket = new TicketCinema (
                $day, 
                $month, 
                $year, 
                $age, 
                $prefSeating, 
                $chosenFilm, 
                $location, 
                $time
            );
            // ticket print
            echo '<div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">
                            '.$newTicket->chosenFilm.' 
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            '.$newTicket->day.'-'.$newTicket->month.'-'.$newTicket->year.' 
                            ticket number: '.$newTicket->uniqueID.', 
                        </h6>
                        <p class="card-text">
                            '.$newTicket->age.' ticket </br>
                            Seat position: '.$newTicket->prefSeating.' </br>
                            Location: '.$newTicket->location.' </br>
                        </p>
                        <p class="card-text">
                            '.$newTicket->time.' - '.$newTicket->showPrice().'
                        </p>
                    </div>
                </div>';
            return; 
        }
        
        return; 
    }

?>