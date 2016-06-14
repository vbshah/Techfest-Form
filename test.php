<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<style>
p{
    opacity: 0;
    font-size:200%;
}
a{
    font-size: 300%;
}
</style>
<script type="text/javascript">
    arr=[];
/*    $(document).ready(function(){
        for(i=0;i<100;i++){
            arr.push("<a target='_blank' href='http://www.google.com' id='"+i.toString()+"'>Sample "+i.toString()+"</a>");
        }
        foo();
    });
    function foo(){
        function fadeinout(i){
//            console.log(i);
            $("#update").html(arr[i]);
            $("#"+i.toString()).animate({opacity:"1"},1000);
            $("#"+i.toString()).fadeIn(2000,function(){
                $("#"+i.toString()).delay(1000).fadeOut(1000,function(){
                    if(i<100){
                        console.log(i);
                        setTimeout(fadeinout(i+1),100);
                    }
                });
            });
        }
        fadeinout(0);  
    }   */
</script>
<style>
    #update a{
        opacity:0;
    }
</style>
</head>
<body>
<div id="update">
</div>
<?php 
/*    if(empty($a)){
        echo "<br>inside";
    }*/
?>
<form action="test3.php" method="post">
<input type="hidden" value="n1" name="n1">
<form method="post" action="test3.php">
<input type="hidden" value="n2" name="n2">
<input type="submit" value="submit">
</form>
</body>
</html>
