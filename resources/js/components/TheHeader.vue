<template>
  <div class="header-container">
    <div class="header-title">Biz bilan mashinangizni <span>qiynalmay</span> toping</div>
    <div class="header-subtitle">Mashinangiz hozirda qaysi jarima maydonchasida ekanligi <br> haqida to'liq ma'lumot oling</div>
    <div class="header-radio">
        <label class="container">
            <input type="radio" checked="checked" name="shaxs" value="yuridik">
            <span class="checkmark"></span>
            Yuridik shaxs
        </label>
        <label class="container">
            <input type="radio" name="shaxs" value="jismoniy">
            <span class="checkmark"></span>
            Jismoniy shaxs
        </label>
    </div>
    <div class="header-search">
        <div class="search-container">
            <form action="">
                <select name="" id="">
                    <option value="Tashkent shahar">01</option>
                    <option value="Tashkent shahar">02</option>
                    <option value="Tashkent shahar">03</option>
                    <option value="Tashkent shahar">04</option>
                    <option value="Tashkent shahar">05</option>
                </select>

                <input maxlength="6" type="text" placeholder="A 123 AB" v-model="carMainNumber" @input="validateCarMainNumber">
                <button type="submit">Qidiruv</button>
            </form>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'TheHeader',

    data() {
        return {
            carCountryNumber: null,
            carMainNumber: null,
            personType: null,
        }
    },

    methods: {
        // validateCountryNumber() {
        //     if(/^-?\d+$/.test(this.carCountryNumber)) {
        //         console.log('true')
        //         console.log(this.carCountryNumber)
        //     }
        // },

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

.header-container {
    margin-top: 180px;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.header-title {
    font-size: 3.25rem;
    text-align: center;
    font-family: Inter-Semibold;
    letter-spacing: -2.5px;
}

.header-title span {
    color: var(--primary-blue);
}

.header-subtitle {
    text-align: center;
    font-size: 1rem;
    margin: 2.5rem 0;
    font-family: Inter-Regular;
    opacity: 0.5;
}

.header-radio {
    font-family: Inter-Regular;
    font-size: 1rem;
    display: flex;
    width: 300px;
    margin-bottom: 2rem;
}

.header-radio label {
    margin: 0;
    padding: 0;
    cursor: pointer;
}

.header-search {
    width: 390px;
}

.search-container {
    background-color: white;
    padding: 1rem;
    border-radius: 8px;
}

.search-container form {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.search-container form select {
    border: none;
    font-family: Inter-Regular;
    font-size: 1.3rem;
    cursor: pointer;
    outline: none;
    opacity: 0.5;
}

.search-container form input {
    border: none;
    text-align: center;
    outline: none;
    font-size: 1.3rem;
    font-family: Inter-Regular;
    overflow: hidden;
    width: 40%;
    border-left: 1px solid;
    height: 100%;
    text-transform: uppercase;
}

.search-container form button {
    width: 110px;
    height: 45px;
    background-color: var(--primary-blue);
    border: none;
    border-radius: 5px;
    font-family: Inter-Regular;
    font-size: 1rem;
    color: white;
}

</style>
