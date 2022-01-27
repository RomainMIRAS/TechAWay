
function first(){
    //gsap.fromTo(".animateSvg", {opacity: 0, scale : 0.8}, {opacity: 1,scale : 1, stagger :0.2});
    gsap.fromTo("#logo", { 
        scale : 7
    }, 
    {
        scale: 1,duration:1.5,stagger:2
    });

    gsap.fromTo("#logo", {
        width: "100vw",height: "100vh"
    },
    {
        width: "200px",height: "200px",duration:1.5, ease: "power3.inOut", 
        onComplete(){
            document.getElementById('logo').style.animation = "hovering 1s infinite alternate";
            gsap.fromTo("#theLogo", {
                x:0,y:0
            },
            {
                x: "33.5%",y:"-35vh",duration:1.5,ease: "power1.inOut"
            });
            gsap.fromTo("#title", {opacity: 0, y : -150,}, {opacity: 1,y : 0});
            gsap.fromTo("#slogan", {opacity: 0, x : -300,}, {opacity: 1,x : 0, stagger :0.2});
        }
    });
}
