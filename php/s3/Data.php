<?php

class StudentData {
    
    private $studentList;

    function __construct(array $studentList) {
        if (sizeof($studentList)>0) {
            $this->studentList = $studentList;
        } else {
            throw new Exception("No Student record available");
        }
    }

    public function getStudentName() {
        $studentNameList = [];

        foreach($this->studentList as $student) {
            $studentNameList[] = array(
                "prn"=>$student['prn'],
                "name"=>$student['fname'] . " " . $student['lname']
            );
        }

        return json_encode($studentNameList);
    }

    public function getStudentByPrn($prn) {
        $response = ["In-Valid PRN"];
        if($prn) {
            foreach($this->studentList as $student) {
                if ($prn == $student['prn']) {
                    $response = $student;
                    break;
                }
            }
        }
        return json_encode($response);
    }

    public function getTopperStudent() {
        $student = null;
        
        $student['grade'] = getGrade($per);
    }

    private function getGrade($per) {
        return "A";
    }

}
?>