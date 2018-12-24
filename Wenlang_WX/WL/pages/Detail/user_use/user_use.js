// pages/Detail/user_use/user_use.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    id: 0,
    nav_active: 0,
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
  select: function (e) {
    console.log(e)

    var that = this;
    that.setData({
      id: e.target.dataset.id,
      tit_con: e.target.dataset.tit,
      nav_active: e.target.dataset.id,
    })
  },
  for_other:function(e){
    wx.navigateTo({
      url: '../for_consult/for_consult',
    })
  },
  xcPage: function () {
    var that = this
    that.setData({
      flags: true,
      tabBarHid: false
    })
  },
})