<?php
    class StudentInfo{    
        public $student_name;
        public $eng;
        public $math;
        public $sci;
        public $sst;
        public $comp;
        public $obt_marks;        
        public $total_marks;
        public $percentage;

        public function __construct(string $student_name){
            $this->student_name = $student_name;
        }

        public function setMarks(int $eng, int $math, int $sci, int $sst, int $comp){
            $this->eng = $eng;
            $this->math = $math;
            $this->sci = $sci;
            $this->sst = $sst;
            $this->comp = $comp;
        }
    }
    class Result extends StudentInfo{
        //get total marks 
        public function getTotalMarks($max_marks ,$total_subject) {
        //max_marks= 100 , total_subject = 5 , total_marks= maxmarks * total_subject
            $this->total_marks = $max_marks * $total_subject;
            return $this->total_marks;
        }
        //get obtained marks > sum all marks 
        public function getObtainMarks(){
            $this->obt_marks = $this->eng + $this->math + $this->sci + $this->sst + $this->comp;
            return $this->obt_marks;
        }
        //get percentage
        public function getPercentage($total_marks, $obtain_marks){
            $this->percentage = $obtain_marks / $total_marks *100 . "%";
        }
        
    }

     
    $max_marks      = 100;
    $total_subject  = 5;

//**  Student 1  **  //
    $std_1 = new Result("Ali");
    $std_1->setMarks(25 , 20 , 52 , 45 , 10 );
//get std_1 result percentage 
    $total_marks    = $std_1->getTotalMarks($max_marks ,$total_subject);
    $obtain_marks   = $std_1->getObtainMarks();
    $std_1->getPercentage($total_marks, $obtain_marks);
    var_dump($std_1);

    
//**  Student 2  **  //
    $std_2 = new Result("Ahmed");
    $std_2->setMarks(50 , 60 , 72 , 85 , 90 );
//get std_2 result percentage
    $total_marks    = $std_2->getTotalMarks($max_marks ,$total_subject);
    $obtain_marks   = $std_2->getObtainMarks();
    $std_2->getPercentage($total_marks, $obtain_marks);
    var_dump($std_2);