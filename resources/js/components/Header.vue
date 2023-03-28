<template>
  <div class="header-container">
    <div class="header-title">Biz bilan mashinangizni <span>qiynalmay</span> toping</div>
    <div class="header-subtitle">Mashinangiz hozirda qaysi jarima maydonchasida ekanligi <br> haqida to'liq ma'lumot oling</div>
    <div class="header-radio">
        <label for="yuridik-shaxs">Yuridik shaxs</label>
        <input type="radio" name="shaxs" id="yuridik-shaxs">
        <label for="jismoniy-shaxs">Jismoniy shaxs</label>
        <input type="radio" name="shaxs" id="jismoniy-shaxs">
    </div>
    <div class="header-search">
        <div class="search-container">
            <form action="">
                <select name="" id="">
                    <option value="Tashkent shahar">01</option>
                    <option value="Tashkent shahar">01</option>
                    <option value="Tashkent shahar">01</option>
                    <option value="Tashkent shahar">01</option>
                    <option value="Tashkent shahar">01</option>
                </select>

                <input type="text" placeholder="A 123 AB">
                <button type="submit">Qidiruv</button>
            </form>
        </div>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>

.header-container {
    margin-top: 200px;
    width: 100%;
}

.header-title {
    font-size: 52px;
    text-align: center;
}

.header-subtitle {
    text-align: center;
    font-size: 1rem;
    margin-top: 50px;
}

</style>