var xHRObject = false;

if (window.XMLHttpRequest)
    xHRObject = new XMLHttpRequest();
else if (window.ActiveXObject)
    xHRObject = new ActiveXObject("Microsoft.XMLHTTP");

function displayData(){
    xHRObject.open("GET", "c.php", true);
    xHRObject.onreadystatechange = function() {
        if (xHRObject.readyState === 4 && xHRObject.status === 200)
            document.getElementById('temperature').innerHTML = xHRObject.responseText;
    }
    xHRObject.send(null);
}