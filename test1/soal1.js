function sum_deep(tree, targetChar) {
    function traverse(node, level) {
        let levelSum = 0;
        if (node[0].includes(targetChar)) {
            levelSum += level;
        }

        for (const child of node.filter(Array.isArray)) {
            levelSum += traverse(child, level + 1);
        }

        return levelSum;
    }

    // Start the traversal from the root node at level 1
    return traverse(tree, 1);
}

// Example usage:
const tree =  ["", ["", ["XXXXX"]]];
const targetChar = "X";
const result = sum_deep(tree, targetChar);
console.log(`Sum of levels containing '${targetChar}': ${result}`);


//challange

const _tree = ["ABAH", ["CIRCA"], ["CRUMP", ["IRA"]], ["ALI"]]
const _targetChar = "ACI"
const _result = sum_deep(_tree,_targetChar)
console.log(_result);
