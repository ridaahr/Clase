//Ej 1
function sumar(arr) {
    if (arr.length === 0) {
        return 0
    }
    return arr[0] + sumar(arr.slice(1))
}
let nums = [2, 5, 3]
console.log(sumar(nums))

//Ej 2
function inverso(string) {
    if (string.length == 0) {
        return ""
    }
    return string[string.length - 1] + inverso(string.slice(0, string.length - 1))
}

console.log(inverso("messi"))