## Rules of code

Bunch of stylistic rules for developing consistent, flexible, and sustainable code.

> Inspiration
> https://codeguide.co/

### CSS:

1. Classes use the **Block, Element, Modifier** methodology (commonly referred to as [BEM](https://en.bem.info/method))


example:
```css
/* Block */
.inputGroup{}

/* Element */
.inputGroup__label{}

/* Modifier */
.inputGroup__label--green{}
```

2.  **Declaration order**

Related property declarations should be grouped together following the order:

1.  Positioning
2.  Box model
3.  Typographic
4.  Visual
5.  Misc

```css
.declaration-order {
  /* Positioning */
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 100;

  /* Box-model */
  display: block;
  float: right;
  width: 100px;
  height: 100px;

  /* Typography */
  font: normal 13px "Helvetica Neue", sans-serif;
  line-height: 1.5;
  color: #333;
  text-align: center;

  /* Visual */
  background-color: #f5f5f5;
  border: 1px solid #e5e5e5;
  border-radius: 3px;

  /* Misc */
  opacity: 1;
}
```