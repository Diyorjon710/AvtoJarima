<template>
    <!-- Main header -->
    <div class="container">
        <header class="main-header">
            <div class="header-main__logo">
                <a href="#">
                    <img src="/assets/img/logo.png" alt="Logo">
                </a>
            </div>
            <div class="main-header__languages">
<!--                <a href="#">-->
<!--                    <img class="main-header__app" src="" alt="app">-->
<!--                </a>-->
                <a href="#">
                    <img class="main-header__app" src="/assets/img/google-play.png" alt="google-play">
                </a>
                <a href="#">
                    <img class="main-header__flag" src="/assets/img/uzbflag.png" alt="Uzb flag">
                </a>
                <a href="#">
                    <img class="main-header__flag" src="/assets/img/rusflag.jpg" alt="Rus flag">
                </a>
                <a href="#">
                    <img class="main-header__flag" src="/assets/img/usaflag.jpg" alt="USA flag">
                </a>
            </div>

            <nav class="main-navigation">
                <ul class="main-navigation__items">
                    <li class="main-navigation__item">
                        <a href="#">Bosh sahifa</a>
                    </li>
                    <li class="main-navigation__item">
                        <a href="#">Biz haqimizda</a>
                    </li>
                    <li class="main-navigation__item">
                        <a href="#">Jarima maydonlari</a>
                    </li>
                    <li class="main-navigation__item">
                        <a href="#">Kontaktlar</a>
                    </li>
                </ul>
            </nav>

        </header>
    </div>
    <!-- /Main header -->

    <!-- Main section -->

    <section class="main-section">
        <div class="container">
            <div class="main-section__type">
                <a href="#">
                    <i class="fa-solid fa-user"></i>
                    Jis.shaxs
                </a>
                <a href="#">
                    <i class="fa fa-building"></i>
                    Yur.shaxs
                </a>
            </div>
            <div class="main-section__search">
                <div class="main-section__input">
                    <input type="text" id="input_one" class="main-section__input-one" placeholder="01" maxlength="2" v-model="carCountryNumber" @input="validateCountryNumber">
                    <input type="text" id="input_two" class="main-section__input-two" placeholder="A 123 EA" maxlength="6" required v-model="carMainNumber" @input="validateCarMainNumber">
                </div>
                <i class="fa fa-magnifying-glass"></i>
                <h3>Qidirish</h3>
            </div>
        </div>
    </section>

    <!-- /Main section -->
</template>

<script>
export default {
    name: "HomeView",

    data() {
        return {
            carCountryNumber: null,
            carMainNumber: '',
        }
    },

    methods: {
        validateCountryNumber() {
            if(/^-?\d+$/.test(this.carCountryNumber)) {
                console.log('true')
                console.log(this.carCountryNumber)
            }
        },

        validateCarMainNumber() {
            let regex1 = /^[A-Za-z]/
            let regex2 = /\d$/g
            let regex3 = /[A-Za-z]/

            if(!this.carMainNumber[0].match(regex1)) {
                this.carMainNumber = ''
            }

            if(this.carMainNumber.slice(1,4)) {
                for(let i = 1; i <= 3; i++) {
                    if(!this.carMainNumber[i].match(regex2)) {
                        this.carMainNumber = this.carMainNumber.slice(0, i)
                    }
                }
            }

            if(this.carMainNumber.slice(4,6)) {
                for(let i = 4; i <= 5; i++) {
                    if(!this.carMainNumber[i].match(regex3)) {
                        this.carMainNumber = this.carMainNumber.slice(0, i)
                    }
                }
            }
        }
    },
}
</script>

<style scoped>

body{
    height: 100vh;
    height: -webkit-fill-available;
}

/* Main header styles */

.main-header{
    display: block;
    padding: 10px 0 0 0 ;
    position: relative;
    margin-top: 20px;
    height: 160px;
    font-size: 0rem;
    width: 100%;
}

.main-header > div{
    float: left;
}

.header-main__logo{
    display: inline-block;
    vertical-align: middle;
    width: 30%;
}

.header-main__logo img{
    width: 300px;
}

.main-header__languages{
    display: inline-block;
    width: 70%;
    text-align: right;
}

.main-header__flag{
    width: 50px;
    margin: 0 5px;
    border: black solid 1px;
}

.main-header__app{
    width: 100px;
    margin: 0 5px;
}

.main-header__languages a{
    text-decoration: none;
}

.main-navigation{
    position: absolute;
    display: inline-block;
    vertical-align: middle;
    padding: 20px;
    left: 300px;
    top: 50px;
}

.main-navigation__item{
    display: inline-block;

}

.main-navigation__item a{
    color: #3F72AF;
    text-decoration: none;
    font-size: 24px;
    font-weight: bold;
    font-family: 'Times New Roman';
    margin: 0 30px;
    letter-spacing: 1px;
}

.main-navigation__item a:hover{
    color: #112D4E;
}

/* Main section styles */

.main-section{
    display: block;
    height: 400px;
    background-color: #3F72AF;
}

.main-section__type{
    text-align: center;
}

.main-section__type i{
    margin: 20px 5px 0 5px;
    color: white;
}

.main-section__type a{
    color: white;
    text-decoration: none;
    margin: 20px;
    padding: 10px;
    font-size: 20px;
    font-family: 'Times New Roman';
}

.main-section__type a:hover{
    color: white;
    border-bottom: white solid 2px;
}

.main-section__input{
    position: relative;
    display: inline-block;
    text-align: right;
    margin: 10px;
    width: 64%;
}

.main-section__search{
    display: inline-block;
    width: 100%;
    margin-top: 20px;
    vertical-align: middle;
}

.main-section__input-one{
    position: absolute;
    width: 110px;
    text-align: left;
    height: 105px;
    border: black solid 5px;
    border-top-left-radius: 25px;
    border-bottom-left-radius: 25px;
    right: 280px;
}

.main-section__input-two{
    width: 280px;
    height: 105px;
    border: 5px black solid;
    border-left: 0;
    border-top-right-radius: 25px;
    border-bottom-right-radius: 25px;

}



.main-section__search h3{
    display: inline-block;
    color: white;
    font-weight: 400;
}

.main-section__search i{
    font-size: 30px;
    color: white;
    margin-left: 20px;
}

::-webkit-input-placeholder {
    position: absolute;
    color: grey;
    opacity: 1; /* Firefox */
    font-size: 60px;
    margin-top: 10px;
    top: -10px;
    left: 20px;
}


input[type=text] {
    text-align: center;
    font-size: 60px;
    text-transform: uppercase;
}







/* @media only screen and (max-width: 768px) {
    .header-main__logo img{
        width: 180px;
    }

    .main-header__flag{
        width: 30px;
    }

    .main-header__languages{
        position: absolute;
        left: 230px;
    }
}

@media only screen and (max-width: 992px) {
    .main-navigation__item > a{
        font-size: 12px;
    }

    .main-navigation{
        margin-bottom: 20px;
        left: 0px;
        top: 50px;
    }
}

@media only screen and (max-width: 1200px) {
    .main-header__app{
        display: none;
    }
}

@media only screen and (max-width: 500px) {
    .main-navigation{

    }
} */

</style>
