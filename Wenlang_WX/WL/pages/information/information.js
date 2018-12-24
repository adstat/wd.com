// pages/information/information.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    maxTextLen:30,
    textLen: 0,

    items: [
      { name: 'CHN', value: '男生' },

      // { name: 'CHN', value: '男生', checked: 'true' },

      { name: 'BRA', value: '女生' },

    ],
    // 多选
    riderCommentList: [{
      value: '沿海散货',
      selected: false,
      title: '沿海散货'
    }, {
        value: '沿海散货',
      selected: false,
      title: '沿海散货'
    }, {
        value: '沿海散货',
      selected: false,
      title: '沿海散货'
    }, {
      value: '服务专业',
      selected: false,
      title: '服务专业'
    }, {
        value: '集装箱',
      selected: false,
      title: '集装箱'
    }, {
      value: '穿着专业',
      selected: false,
      title: '穿着专业'
    }, {
        value: '集装箱',
      selected: false,
      title: '集装箱'
    }, {
        value: '国际邮轮',
      selected: false,
      title: '国际邮轮'
    }],
  },
  radioChange: function (e) {

    console.log('radio发生change事件，携带value值为：', e.detail.value)

  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
  
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {
  
  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {
  
  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {
  
  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {
  
  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {
  
  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {
  
  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {
  
  },
  getWords(e) {
    let page = this;
    // 设置最大字符串长度(为-1时,则不限制)
    let maxTextLen = page.data.maxTextLen;
    // 文本长度
    let textLen = e.detail.value.length;

    page.setData({
      maxTextLen: maxTextLen,
      textLen: textLen
    });

  },


  checkboxChange(e) {
    console.log('checkboxChange e:', e);
    let string = "riderCommentList[" + e.target.dataset.index + "].selected"
    this.setData({
      [string]: !this.data.riderCommentList[e.target.dataset.index].selected
    })
    let detailValue = this.data.riderCommentList.filter(it => it.selected).map(it => it.value)
    console.log('所有选中的值为：', detailValue)
  },
})