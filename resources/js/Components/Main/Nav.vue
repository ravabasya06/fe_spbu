<script setup>
import { usePage } from "@inertiajs/vue3";
import Search from "../../Components/Analysis/Search.vue";

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
        <div class="left-group">
            <div class="menu-icon" @click="toggleSidebar">
                <font-awesome-icon icon="bars" />
            </div>
            <Link href="/">
                <img
                    class="logo"
                    src="../../../../public/images/pertamina.png"
                    alt="logo"
                />
            </Link>
        </div>
        <Search />
        <div class="right-group">
            <Link v-if="user && user.isAdmin" href="/create">
                <div class="plus-button">
                    <font-awesome-icon icon="plus" />
                </div>
            </Link>
            <Link href="/profile">
                <div class="user-icon">
                    <font-awesome-icon icon="user" />
                </div>
            </Link>
        </div>
    </nav>
    <div class="sidebar" id="sidebar">
        <a href="javascript:void(0)" class="closebtn" @click="closeSidebar">
            <font-awesome-icon
                icon="circle-xmark"
                class="fa-2xl"
                style="color: #ffffff"
            />
        </a>
        <ul class="categories">
            <div v-if="user" class="categories-list">
                <span class="categories-title">General</span>
                <li><Link href="/">Home</Link></li>
                <li><Link href="/dashboard">Dashboard</Link></li>
                <li class="last-list">
                    <Link href="/analysis">Analysis</Link>
                </li>
            </div>
            <div v-if="user && user.isAdmin" class="categories-list">
                <span class="categories-title">Admin</span>
                <li>
                    <Link href="/register">Register User</Link>
                </li>
                <li class="last-list">
                    <Link href="/">Manage User</Link>
                </li>
            </div>
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
}
.categories {
    display: flex;
    flex-direction: column;
    gap: 20px;
}
.categories-list {
    display: flex;
    justify-content: center;
    flex-direction: column;
    border: solid 1px rgb(32, 32, 32);
    border-radius: 10px;
    margin: 15px;
}
.categories-title {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    background-color: rgb(32, 32, 32);
    font-weight: bold;
    text-align: center;
}

.logo {
    width: 125px;
}

.menu-icon {
    font-size: 24px;
    cursor: pointer;
}

.right-group {
    display: flex;
    align-items: flex-end;
    justify-content: flex-end;
    gap: 25px;
    margin: 10px;
}

.left-group {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    gap: 25px;
    margin: 10px;
}

.user-icon {
    color: white;
    font-size: 24px;
    cursor: pointer;
    border-radius: 20%;
}
.plus-button {
    color: white;
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
    color: white;
    text-decoration: none;
    display: block;
    transition: 0.3s;
}

.last-list a {
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
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
