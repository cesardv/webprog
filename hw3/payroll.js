function payroll(){
			var inTxt = "";
			var tothrs = 0;
			var employeeCount = 1;
			var wage = 15;
			var totpayroll = 0;
            /* var area = document.getElementById('area'); */
			while(true){
			    if (employeeCount === 1) {
			        var ans = prompt("Please enter the hours worked for employee # " + employeeCount + " this pay period: ");
			        /* If cancel was hit, exit */
			        if (ans == "NaN" || ans == null) {
			            alert("Cancelling payroll calculation...");
			            break;
			        }
                    inTxt = parseInt(ans);
					document.write("<table id='payrolltbl' border=\"1\" align=\"center\"><tbody id='ptblbody'><tr><th>Employee#&nbsp; </th><th width=\"33%\"> Hours Worked&nbsp; </th><th width=\"33%\"> Gross Pay </th></tr>");
				}
			    else {
			        var ans2 = prompt("Enter a negative number to stop, or continue entering hours worked for employee # " + employeeCount + " this pay period: ");
			        
			        /* If cancel was hit, exit */
			        if (ans2 == "NaN" || ans2 == null) {
			            alert("Cancelling payroll calculation...");
			            break;
			        }
			        inTxt = parseInt(ans2);
				}
                
				if(employeeCount == 1 && inTxt <= 0){
					alert("You must enter at least 1 employee's payroll info. Try again...");
					break;
				}
				
				if(inTxt <= 0){ /* finalize table*/
				    document.write("<tr><th>&nbsp;</th><th>Total hours: " + tothrs + "</th><th>$" + totpayroll + "</th></tr>\n</table>");
					break;
				}
				var gross = 0;
				if(inTxt < 40){
					gross = wage*inTxt;
					totpayroll += gross;
				}
				else {
					gross = 40*wage + (inTxt - 40)*wage*1.5;
					totpayroll += gross;
				}
				tothrs += inTxt;
				document.write("<tr><td>" + employeeCount + "</td><td>" + inTxt + "</td><td>" + gross + "</td></tr>\n");
				
				employeeCount++;
			}
			/* TODO: I noticed this code breaks when you hit cancel on the prompt...*/
			document.body.insertAdjacentHTML("afterbegin", "<h1>Payroll JS App</h1><br/><input type=\"button\" value='Start Payroll' onClick=\"payroll()\" /> ");
			document.body.insertAdjacentHTML("beforeend", "<p><a href='./js2.html'>Part C</a></p>");
		}