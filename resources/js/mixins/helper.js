export function  capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

export function  getStrPart(string) {
    return string.slice(7, -4)
}

export function  getSubstring(string, offset, size) {
    
    let newString = string.substring(offset, size)
            
    if (string.length > newString.length) {
        return newString + '...'
    } else {
        return newString 
    }
}