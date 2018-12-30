/**
 * File navigation.js.
 *
 *
 */

window.onload = function () {
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

    for (const liElement of liElementsWithSubMenu) {
        const button = liElement.getElementsByClassName("nav-parent-button")[0];

        button.onclick = function () {
            let liClasses = liElement.getAttribute("class");

            if (liClasses.includes("show-sub-menu")) {
                liClasses = liClasses.replace("show-sub-menu", "");
            } else {
                liClasses += " show-sub-menu";
            }

            liElement.setAttribute("class", liClasses);
        }

    }

}

function initMenuButton(mainNav) {
    const button = document.getElementById("nav-button");

    button.onclick = function () {
        const ariaExpanded = mainNav.getAttribute("aria-expanded");

        if (ariaExpanded === "true") {
            mainNav.setAttribute("aria-expanded", "false");
        } else {
            mainNav.setAttribute("aria-expanded", "true");
        }

    }
}