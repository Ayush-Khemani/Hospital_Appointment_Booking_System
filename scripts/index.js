const counterNums = document.querySelectorAll('.counter-number');

const speed = 200;
counterNums.forEach((currElem) => {
    const updateNum = () => {
        const targetNum = parseInt(currElem.dataset.number);
        // console.log(targetNum);
        const currNum = parseInt(currElem.innerText); 
        const IncrementSpeed = Math.trunc(targetNum / speed);
        // console.log(IncrementSpeed);
        if (currNum < targetNum) {
            currElem.innerText = currNum + IncrementSpeed + "+";
            setTimeout(updateNum, 10);
        }
    }

    updateNum();


})