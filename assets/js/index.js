console.log(document.documentElement.clientWidth);
console.log(document.getElementsByClassName("inspirations-group")[0].style);

//More inspiration resize
window.addEventListener("resize", moreInsRes);
moreInsRes();

function moreInsRes() {
    const viewportHeight = document.documentElement.clientWidth;
    const mapHeight = document.getElementsByClassName("inspiration-map")[0]
        .clientHeight;

    if (viewportHeight > 570) {
        document.getElementsByClassName(
            "inspirations-group"
        )[0].style.height = `${mapHeight}px`;
    }
}
