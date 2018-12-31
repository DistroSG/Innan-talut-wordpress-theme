/**
 * File navigation.js.
 *
 *
 */

window.onload = () => {
    const mainNav = document.getElementById("main-nav");

    if (!mainNav) {
        return;
    }

    this.initMenuButton(mainNav);
    this.initParentButtons(mainNav);
}

function initParentButtons(mainNav) {
    const liElementsWithSubMenu = mainNav.getElementsByClassName("menu-item-has-children");

    if (liElementsWithSubMenu.lenght === 0) {
        return;
    }

    for (const liElementWithSubMenu of liElementsWithSubMenu) {
        const button = liElementWithSubMenu.getElementsByClassName("nav-parent-button")[0];
        button.onclick = () => liElementWithSubMenu.toggleAttribute("sub-menu-expanded");
    }

}

function initMenuButton(mainNav) {
    const button = document.getElementById("nav-button");
    button.onclick = () => mainNav.toggleAttribute("menu-expanded");
}