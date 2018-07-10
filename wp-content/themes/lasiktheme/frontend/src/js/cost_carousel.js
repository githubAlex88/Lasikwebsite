import utils from './utils'

export default {
  $els: {
    rotator: document.querySelector('.rotator'),
    circleWrapper: document.querySelector('.numbers'),
    circles: [].map.call(document.querySelectorAll('.each'), item => item),
    border: document.querySelector('.border-rotator'),
    borderPath: document.querySelector('.border-rotator .border-path'),
    contentSection: document.querySelector('.rotator-shown-values'),
  },
  interval: null,
  rotateShift: 90,
  currentDeg: 0,
  currentActiveNumber: 1,
  numbersAmount: 4,
  rotation(num) {
    let next
    if(this.currentActiveNumber < this.numbersAmount) {
      next = ++this.currentActiveNumber
    } else {
      this.currentActiveNumber = 1
      next = this.currentActiveNumber
    }

    if(num) {
      this.currentActiveNumber = num
      next = this.currentActiveNumber
    }

    this.setRotateStyle(next)
    this.setActive(next)
  },
  setRotateStyle(num, oldNum) {
    let rotateDeg;

    if(oldNum) {
      rotateDeg = this.currentDeg - this.rotateShift * (num - oldNum)
    } else {
      rotateDeg = this.currentDeg - this.rotateShift
    }

    this.$els.circleWrapper.style.transform = `rotate(${rotateDeg}deg)`
    this.$els.circles.forEach((item, index) => {
      let circleItemDeg
      if(oldNum) {
        circleItemDeg = this.currentDeg + this.rotateShift * (num - oldNum)
      } else {
        circleItemDeg = this.currentDeg + this.rotateShift
      }
      item.children[0].style.transform = `rotate(${rotateDeg * -1}deg)`
    })

    this.$els.border.style.transform = `rotate(${rotateDeg}deg)`
    this.setStrokeDashoffset(num)
    this.currentDeg = rotateDeg
  },
  setStrokeDashoffset(num) {
    let val = num * 25;
    const r = 25;
    const c = Math.PI*(r*2);

    if (val < 0) { val = 0;}
    if (val > 100) { val = 100;}

    var pct = ((100-val)/100)*c;
    this.$els.borderPath.style.strokeDashoffset = pct
  },
  setActive(num) {
    this.$els.circles.forEach(item => {
      if(item.getAttribute('data-number') == num) {
        item.classList.add('active')
        this.setSectionContent(item)
      } else {
        item.classList.remove('active')
      }
    })
  },
  setSectionContent(item) {
    this.$els.contentSection.classList.add('out')
    utils.wait(300)
    .then(() => {
      utils.collectionIterator(item.children, child => {
        utils.collectionIterator(
          this.$els.contentSection.querySelectorAll('.'+child.getAttribute('data-target')),
          target => {
            target.innerHTML = child.innerHTML
          }
        );
      })
      this.$els.contentSection.querySelector('a').setAttribute('href', '#' + item.getAttribute('data-url'))
      return utils.wait(300)
    })
    .then(() => {
      this.$els.contentSection.classList.remove('out')
    });
  },
  startRotation() {
    this.interval = utils.requestInterval(this.rotation, 5000, this)
  },
  stopRotation() {
    utils.clearInterval(this.interval.value)
  },
  init() {
    if(!this.$els.circles.length) return false;
    this.startRotation()
    this.$els.circles.forEach(item => {
      item.addEventListener('click', (e) => {
        let itemNumber = parseInt(item.getAttribute('data-number'))
        if(itemNumber === this.currentActiveNumber) return;
        this.stopRotation()
        this.setRotateStyle(itemNumber, this.currentActiveNumber)
        this.currentActiveNumber = itemNumber
        this.setActive(this.currentActiveNumber)
        this.startRotation()
      })
    })
  }
}
