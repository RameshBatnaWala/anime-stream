var frm = $('#Status');

    frm.submit(function (e) {

        e.preventDefault();
        var rates = document.getElementsByName('status');
        var statusV;
        for(var i = 0; i < rates.length; i++){
            if(rates[i].checked){
                statusV = rates[i].value;
            }
        }

        console.log(statusV);

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                console.log('Submission was successful.');
                document.getElementById('StatusButton').firstChild.data = statusV;
                console.log(data);
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });