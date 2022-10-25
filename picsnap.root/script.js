const stripe = Stripe("pk_test_51LHDBnAiKphMTOH0AOS7z5Sd9zjLm1gD3M6CarmGSuvBXu9sfqReCRtrYYn8tzKqUOIvExpiCFThYRN37PeGr6OK00Sxvjj40a")
const btn = document.querySelector('#btn')
btn.addEventListener('click', ()=>{
    fetch('/cart.php',{
        method:"POST",
        headers:{
            'Content-type' : 'application/json',
        },
        body: JSON.stringify({})
    }).then(res=> res.json())
    .then(payload => {
        stripe.redirectToCheckout({sessionID: payload.id})
    })
})