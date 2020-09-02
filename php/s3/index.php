<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example for Data Class</title>
</head>
<body>
    <script src="jquery-3.5.1.min.js"></script>
    <script>
        // let base_url = "http://localhost/wt2020/php/s3/student.php";
        let base_url = "http://edutechclsx.000webhostapp.com/api/test/";

        $("document").ready(function(){
            // getStudentNameList();
            // getStudentByPrn();
            $.get(base_url,function(data,success){
                console.log(data);
            });
        });

        function getStudentNameList() {
            let url = base_url + "?req=name_list";
            $.get(url,function(data,success){
                console.log(data.length);
                console.log(data);
            });
        }

        function getStudentByPrn() {
            let prn = 12345;
            let url = base_url + "?req=student_data&prn="+prn;
            $.get(url,function(data,success){
                console.log(data.length);
                console.log(data);
            });
        }
    </script>
</body>
</html>