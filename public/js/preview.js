function previewImage() {

    var fileKetua = document.getElementById('gambarKetua').files;
    var fileWakil = document.getElementById('gambarWakil').files;

    if (fileKetua.length > 0) {

        var fileReader = new FileReader();

        fileReader.onload = function (event) {

            var filename = document.getElementById('filenameKetua');
            filename.innerHTML = fileKetua[0].name;

        };

        fileReader.readAsDataURL(fileKetua[0]);

    }if (fileWakil.length > 0) {

        var fileReader = new FileReader();

        fileReader.onload = function (event) {

            var filename = document.getElementById('filenameWakil');
            filename.innerHTML = fileWakil[0].name;

        };

        fileReader.readAsDataURL(fileWakil[0]);

    }


}

function previewFile() {

    var fileExcel = document.getElementById('fileExcel').files;
    if( fileExcel.length > 0 ) {

     
        var fileReader = new FileReader();

        fileReader.onload = function (event) {

            var filename = document.getElementById('filenameExcel');
            filename.innerHTML = fileExcel[0].name;

        };

        fileReader.readAsDataURL(fileExcel[0]);

    }

}
