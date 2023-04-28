<template>
    <div class="navbar-container">
        <nav>
            <div class="navbar-left">
                <div class="navbar-left__img">
                    <img src="/assets/img/logo-blck.png" alt="LOGO">
                </div>
            </div>
            <div class="navbar-right">
                <div class="navbar-items">
                    <ul>
                        <li><router-link to='/'>Biz haqimizda</router-link></li>
                        <li><router-link to='/'>Jarima maydonlari</router-link></li>
                        <li><router-link to='/'>Aloqa</router-link></li>
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
    font-family: Inter-Regular;
    font-size: 1rem;
}

.navbar-items ul a {
    color: black;
    text-decoration: none;
    font-size: 1rem;
}

.navbar-left__img {
    width: 150px;
}

.navbar-left__img img {
    width: 100%;
    object-fit: cover;
}

</style>
