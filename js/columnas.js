$(document).ready(function() {
    columnasC = ['.opera', '.mc', '.lri', '.lrs', '.fr', '.frp', '.fa', '.fra', '.frap', '.fc', '.frc', '.frcp', '.fmc', '.grd', '.mcm', '.mcm2'];
    columnasI = ['#opera', '#mc', '#lri', '#lrs', '#fr', '#frp', '#fa', '#fra', '#frap', '#fc', '#frc', '#frcp', '#fmc', '#grd', '#mcm', '#mcm2'];

    var i = 0;

    columnasC.forEach(c => {
        var columnai = columnasI[i];
        if ($(columnai).is(':checked')) {
            $(c).show();
        } else {
            $(c).hide();
        }
        i++;
    });

    i = 0;

    columnasC.forEach(c => {
        var columnai = columnasI[i];
        $(columnai).click(function() {
            if ($(columnai).is(':checked')) {
                $(c).show();
            } else {
                $(c).hide();
            }
        });
        i++;
    });

});