var methodPay=[];
  var myIndex;
   function addMethod(){
    if(document.getElementById("tPaymentMethod").value!=="")
    {
        var newClient={
            name:document.getElementById("paymentMethod").value,
            typeM:document.getElementById("tPaymentMethod").value
          }
          methodPay.push(newClient)
          displaymethodPay()
          document.getElementById("errorType").style.visibility = "hidden"
    }else{
        document.getElementById("errorType").style.visibility = "visible"
    }
  }

  function displaymethodPay(){
    document.getElementById("form-list-client-body").innerHTML=""
    for (i=0;i<methodPay.length;i++){
      var myTr=document.createElement("tr")
      for(a in methodPay[i]){
        var mytd=document.createElement("td")
        mytd.innerHTML=methodPay[i][a]
        myTr.appendChild(mytd)
      }
      var actionTd=document.createElement("td")
      var editBtn=document.createElement("button")
      editBtn.innerHTML="Edit"
      editBtn.setAttribute("class" , "btn btn-sm btn-primary")
      editBtn.setAttribute("onclick" , "editClient("+i+")")

      var deletebtn=document.createElement("button")
      deletebtn.innerHTML="Delete"
      deletebtn.setAttribute("class" , "btn btn-sm btn-danger")
      deletebtn.setAttribute("onclick" , "deleteClient("+i+")")

      actionTd.appendChild(editBtn)
      actionTd.appendChild(deletebtn)
      myTr.appendChild(actionTd)
      document.getElementById("form-list-client-body").appendChild(myTr)

      }
      document.getElementById("paymentMethod").value="Crypto";
      document.getElementById("tPaymentMethod").value=""
  }

  //Editing Method
  function editClient(i){
    console.log(methodPay[i])
    myIndex=i;
    var updatebtn=document.createElement("button")
    updatebtn.innerHTML="Update";
    updatebtn.setAttribute("class", "btn btn-sm btn-success")
    updatebtn.setAttribute("onclick","updClient()")
    document.getElementById("saveupdate").innerHTML=""
    document.getElementById("saveupdate").appendChild(updatebtn);
    document.getElementById("paymentMethod").value=methodPay[i].name
    document.getElementById("tPaymentMethod").value=methodPay[i].typeM
  }

  //Updating Method
  function updClient(){
    var updatedClient={
      name:document.getElementById("paymentMethod").value,
      typeM:document.getElementById("tPaymentMethod").value
    }
    methodPay[myIndex]=updatedClient;
    var crbtn=document.createElement("button")
    crbtn.innerHTML="Save";
    crbtn.setAttribute("onclick","addClient()")
    crbtn.setAttribute("class","btn btn-sm btn-success")
    document.getElementById("saveupdate").innerHTML=""

    document.getElementById("saveupdate").appendChild(crbtn);

    displaymethodPay()
  }

  //deleting Method
  function deleteClient(i){
    methodPay.splice(i,1)
    displaymethodPay()
  }
