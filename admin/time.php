<span id=tick2>			
<script>
//script de hora y fecha para la pagina principal
				function show2(){
				if (!document.all&&!document.getElementById)
				return
				thelement=document.getElementById? document.getElementById("tick2"): document.all.tick2
				var Digital=new Date()
				var hours=Digital.getHours()
				var minutes=Digital.getMinutes()
				
				var dn="PM"
				if (hours<12)
				dn="AM"
				if (hours>12)
				hours=hours-12
				if (hours==0)
				hours=12
				if (minutes<=9)
				minutes="0"+minutes
				
				var ctime=hours+":"+minutes+" "+dn
				thelement.innerHTML=ctime
				setTimeout("show2()",1000)
				}
				window.onload=show2
				
</script>
</span>
&nbsp;|&nbsp;Hoy es:
	      <?php
            $date = new DateTime();
            echo $date->format('d, m, Y');
          ?>

 
   
