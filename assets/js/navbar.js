// /**
//  * Handles navbar expansion on mouse over.
//  *
//  * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
//  * @version 1.0.0
//  */

// 'use strict'

// const nav = document.getElementById('nav')
// const navMain = document.getElementById('nav__main')
// const forHim = document.getElementById('for-him')
// const forHer = document.getElementById('for-her')
// const featured = document.getElementById('featured')
// const newArrial = document.getElementById('new-arrival')
// const navExpanded = document.getElementById('nav__expanded')
// const forHimExpanded = document.getElementById('for-him__expanded')
// const forHerExpanded = document.getElementById('for-her__expanded')

// // Toggle visibility for individual expanded nav section
// navMain.addEventListener('mouseover', (e) => {
//   if (e.target == navExpanded ||
//     e.target == forHimExpanded ||
//     e.target == forHerExpanded) {
//     show(navExpanded)
//   }

//   if (e.target === forHim) {
//     show(navExpanded)
//     hide(forHerExpanded)
//     show(forHimExpanded)
//   }

//   if (e.target === forHer) {
//     show(navExpanded)
//     hide(forHimExpanded)
//     show(forHerExpanded)
//   }

//   if (e.target === featured || e.target === newArrial) {
//     hide(navExpanded)
//     hide(forHimExpanded)
//     hide(forHerExpanded)
//   }
// })

// navExpanded.addEventListener('mouseout', () => {
//   hide(navExpanded)
// })

// /**
//  * Show element.
//  *
//  * @param {Element} element
//  *
//  * @returns {Void}
//  */
// function show (element) {
//   element.classList.remove('hide')
// }

// /**
//  * Hide element.
//  *
//  * @param {Element} element
//  *
//  * @returns {Void}
//  */
// function hide (element) {
//   element.classList.add('hide')
// }
