<script setup>
import { usePage } from "@inertiajs/vue3";
const { user } = usePage().props;

function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    if (sidebar.style.width === "250px") {
        sidebar.style.width = "0";
    } else {
        sidebar.style.width = "250px";
    }
}
function closeSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.style.width = "0";
}
</script>

<template>
    <nav class="navbar">
        <div class="menu-icon" @click="toggleSidebar">
            <font-awesome-icon icon="bars" />
        </div>
        <img
            class="logo"
            src="../../../../public/images/pertamina.png"
            alt="logo"
        />
        <Link href="/profile">
            <div class="user-icon">
                <font-awesome-icon icon="user" />
            </div>
        </Link>
    </nav>
    <div class="sidebar" id="sidebar">
        <a href="javascript:void(0)" class="closebtn" @click="closeSidebar">
            <font-awesome-icon
                icon="circle-xmark"
                class="fa-2xl"
                style="color: #ffffff"
            />
        </a>
        <ul>
            <li><Link href="/">Home</Link></li>
            <li><Link href="/dashboard">Dashboard</Link></li>
            <li><Link href="/analysis">Analysis</Link></li>
            <li v-if="user && user.isAdmin">
                <Link href="/adminpanel">Admin Panel</Link>
            </li>
        </ul>
    </div>
</template>

<style scoped>
.navbar {
    justify-content: space-between;
    position: sticky;
    background-color: black;
    border-bottom: 2px solid red;
    padding: 10px;
    width: 100%;
    z-index: 1;
    left: 0;
    right: 0;
}

.logo {
    width: 125px;
    margin: 20px;
}

.menu-icon {
    margin: 20px;
    font-size: 24px;
    cursor: pointer;
}

.user-icon {
    color: white;
    margin: 5px;
    padding: 15px;
    font-size: 24px;
    cursor: pointer;
    border-radius: 20%;
}
.sidebar {
    height: 100%;
    position: fixed;
    width: 0;
    top: 0;
    left: 0;
    background-color: #000000;
    z-index: 10;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    color: white;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    text-align: center;
}

.sidebar ul li a {
    padding: 15px;
    margin: 0 20px 0 20px;
    border-radius: 10px;
    color: white;
    text-decoration: none;
    display: block;
    transition: 0.3s;
}

.sidebar ul li a:hover {
    background-color: #460606;
}

.closebtn {
    position: absolute;
    top: 20px;
    left: 20px;
    text-align: left;
}
</style>
