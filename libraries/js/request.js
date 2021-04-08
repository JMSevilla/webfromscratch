

var firstname = document.getElementById("txtfirstname");
var lastname = document.getElementById("txtlastname");
const state = { 
    app : 'app/',
    helper : 'Helper',
    modifier: false,
    updateID: 0
}

const request = { 
    create(obj) { 
        $.post(state.app + state.helper + "/postHelper.php", obj, (response) => {
            var jsondestroy = JSON.parse(response);
            if(jsondestroy.statusCode === 200) { 
                alert("Successfully Insert");
                this.fetchAll();
            }
        });
    },
    fetchAll() { 
        $.ajax({
            method: 'post', 
            url: "app/Helper/postHelper.php",
            data:{ 
                getTrigger: true
            },
           
            success: function(response) { 
                
                $('#tbrefresh').html(response);
            }
        })
    },
    destroy(id) { 
        $.post(state.app + state.helper + "/postHelper.php", 
        stateDelete={
            id: id,
            ondeleteTrigger: true
        }, (response) => {
            console.log(response);
        })
    },
    patch(){
        
    },
    patchSelect() { 

    },
    fetchAPI() {
        $.get('https://localhost:44349/api/react-data/react-fetch', (response) => {
            console.log(response);
        })

    }
}


$('#onsubmit').click(function(){ 
    var obj = { 
        data1: firstname.value,
        data2: lastname.value,
        trigger: true
    }
    validate(obj)
})

function validate(obj) {
    //validation
    if(!obj.data1 || !obj.data2) { 
        alert("Empty text fields please try again..");
        return false;
    }
    else { 
        request.create(obj);
    }
}


getall();
function getall() {
    request.fetchAll();
}

request.fetchAPI();

function ondelete(id) {
    request.destroy(id);
}
