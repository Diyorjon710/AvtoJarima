<template>
    <div class="navbar-container">
        <nav>
            <div class="navbar-left">
                <div class="navbar-left__img">
                    <img src="http://avtojarima.loc/assets/main-page/img/image-7.png" alt="LOGO">
                </div>
            </div>
            <div class="navbar-right">
                <div class="navbar-items">
                    <ul>
                        <li><router-link to='/'>Biz haqimizda</router-link></li>
                        <li><router-link to='/'>Biz haqimizda</router-link></li>
                        <li><router-link to='/'>Biz haqimizda</router-link></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'TheNavbar',
}
</script>

<style scoped>

.navbar-container {
    margin: 50px 250px;

}

nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.navbar-items ul {
    display: flex;
    list-style: none;
    flex-wrap: wrap;
    margin: 0;
}

.navbar-items ul li {
    margin: 0 10px;
}

.navbar-items ul a {
    color: black;
    text-decoration: none;
    font-size: 1rem;
}

</style>
