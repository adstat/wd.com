// pages/my_page/business_card/business_card.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    currentTab: 0,
  },
  // 点击标题切换当前页时改变样式
  swichNav: function (e) {
    var that = this;
    var cur = e.target.dataset.current;
    if (that.data.currentTab == cur) {
      return false;
    } else {
      that.setData({
        currentTab: cur
      })
      if (cur == 0) {
        // that.onePage()
        // 推荐
      } else if (cur == 1) {
        // that.tPage()
      } else if (cur == 2) {
        // that.twoPage()
        //关注
      }
    }
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    wx.setNavigationBarTitle({
      title: '我的名片'  //修改title
    })
  },

  //跳转到 显示设置 页面
  show_shezhi:function(){
    wx.navigateTo({
      url: '../card_fit/card_fit'
    })
  },

  //跳转到 我的咨询 页面
  my_consult:function(){
    wx.navigateTo({
      url: '../interlocution/interlocution'
    })
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

  }
})