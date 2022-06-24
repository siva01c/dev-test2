/**
 * Simple string reversal.
 *
 * @see  JavaScript Algorithm: Simple String Reversal
 * @link https://levelup.gitconnected.com/javascript-algorithm-simple-string-reversal-df44d83c9a5a

 * @param {string} st
 *   String which have to be reversed.
 * @param {int} a
 *   Starting letter index.
 * @param {int} b
 *   Ending letter index.
 *
 * @returns {string}
 *   Reversed string.
 */
function solve(st,a,b){
    let strArr = st.split("");
    let start = strArr.slice(0, a);
    let end = strArr.slice(b+1);
    let reverseSection = strArr.slice(a,b+1).reverse();

    return start.concat(reverseSection.concat(end)).join("");
}
