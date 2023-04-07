<template>
  <div class="header-container">
    <div class="header-title">Biz bilan mashinangizni <span>qiynalmay</span> toping</div>
    <div class="header-subtitle">Mashinangiz hozirda qaysi jarima maydonchasida ekanligi <br> haqida to'liq ma'lumot oling</div>
    <div class="header-radio">
        <label class="container">
            <input type="radio" checked name="shaxs" value="jismoniy" @input="inputPlaceholder = 'A 123 AB'" v-model="personType">
            <span class="checkmark"></span>
            Jismoniy shaxs
        </label>

        <label class="container">
            <input type="radio" name="shaxs" value="yuridik" @input="inputPlaceholder = '123 AAB'" v-model="personType">
            <span class="checkmark"></span>
            Yuridik shaxs
        </label>
    </div>
    <div class="header-search">
        <div class="search-container">
            <form action="" @submit.prevent="searchCar">
                <select name="country-code" v-model="carCountryNumber">
                    <option :selected="country.selected" v-for="country in countryCodes" :value="country.name">{{ country.code }}</option>
                </select>

                <input maxlength="6" type="text" name="main-number" :placeholder="inputPlaceholder" v-model="carMainNumber" @input="validateCarMainNumber">
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
            carCountryNumber: 'Toshkent shaxar',
            carMainNumber: null,
            personType: 'jismoniy',
            inputPlaceholder: 'A 123 AB',

            countryCodes: [
                {id: 1, code: '01', name: 'Toshkent shahar', selected: true},
                {id: 2, code: '02', name: 'Toshkent shahar1'},
                {id: 3, code: '03', name: 'Toshkent shahar2'},
                {id: 4, code: '04', name: 'Toshkent shahar3'},
                {id: 5, code: '05', name: 'Toshkent shahar4'},
            ]
        }
    },

    methods: {
        validateCarMainNumber() {
            let regex1 = /^[A-Za-z]/
            let regex2 = /\d$/g
            let regex3 = /[A-Za-z]/

            if(this.personType === 'jismoniy') {

                if(this.carMainNumber[0]) {
                    if(!this.carMainNumber[0].match(regex1)) {
                        this.carMainNumber = ''
                    }
                }

                for(let i = 1; i <= 3; i++) {
                    if(this.carMainNumber[i]) {
                        if(!this.carMainNumber[i].match(regex2)) {
                            this.carMainNumber = this.carMainNumber.slice(0, i)
                        }
                    }
                }

                for(let i = 4; i <= 5; i++) {
                    if(this.carMainNumber[i]) {
                        if(!this.carMainNumber[i].match(regex3)) {
                            this.carMainNumber = this.carMainNumber.slice(0, i)
                        }
                    }
                }

            } else if (this.personType === 'yuridik') {
                for(let i = 0; i <= 2; i++) {
                    if(this.carMainNumber[i]) {
                        if(!this.carMainNumber[i].match(regex2)) {
                            this.carMainNumber = this.carMainNumber.slice(0, i)
                        }
                    }
                }

                for(let i = 3; i <= 5; i++) {
                    if(this.carMainNumber[i]) {
                        if(!this.carMainNumber[i].match(regex3)) {
                            this.carMainNumber = this.carMainNumber.slice(0, i)
                        }
                    }
                }
            }
        },

        searchCar() {
            axios
                .post('/api/search-car', {
                    'main-number': this.carMainNumber.toUpperCase(),
                    'country-code': this.carCountryNumber,
                })
                .then(response => {
                    console.log('status: ', response.data.status)
                    console.log(response.data)
                })
                .catch(error => {
                    console.log(error.response.data.data)
                })
        }
    },

}
</script>

<style scoped>

.header-container {
    margin-top: 160px;
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
    box-shadow:
        0 6.4px 6.1px rgba(0, 0, 0, 0.023),
        0 11px 13.6px rgba(0, 0, 0, 0.022),
        0 16.3px 27.3px rgba(0, 0, 0, 0.021),
        0 22.8px 55px rgba(0, 0, 0, 0.02),
        0 30px 100px rgba(0, 0, 0, 0.02);
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
