function getScheme(html) {
    const schemeRegex = /<\w+\s+.*?sc-(\w+)\s*.*?>.*?<\/\w+>/g;
    const schemeMatches = html.match(schemeRegex);

    if (!schemeMatches) {
        return [];
    }

    const schemeNames = schemeMatches
        .map((match) => {
            const schemeAttr = /sc-(\w+)/.exec(match);
            return schemeAttr ? schemeAttr[1] : null;
        })
        .filter(Boolean);

    return schemeNames;
}

const htmlInput = "<div><div sc-rootbear title=”Oh My”>Hello <i sc-org>World</i></div></div>" ;
const schemeNames = getScheme(htmlInput);
console.log(schemeNames);
