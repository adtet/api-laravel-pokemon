function patternCount(text, pattern) {
    const textLength = text.length;
    const patternLength = pattern.length;
    let count = 0;

    for (let i = 0; i <= textLength - patternLength; i++) {
        let match = true;
        for (let j = 0; j < patternLength; j++) {
            if (text[i + j] !== pattern[j]) {
                match = false;
                break;
            }
        }
        if (match) {
            count++;
        }
    }

    return count;
}


const text = "abakadabra";
const pattern = "ab";
const result = patternCount(text, pattern);
console.log(result);