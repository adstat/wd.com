// pages/Detail/Subdiscussion/Subdiscussion.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    zan: 1,
    shoucan: 1,
    shoucan2: 1,
    nav_active: 0,
    id:0,
    actionSheetHidden: true,
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
  shou: function (e) {
    console.log(e)
    var that = this;
    var id_shou = e.currentTarget.dataset.id;
    if (id_shou == 1) {
      that.setData({
        shoucan: 2
      })
    } else if (id_shou == 2) {
      that.setData({
        shoucan: 1
      })
    }
  },
  shou2: function (e) {
    console.log(e)
    var that = this;
    var id_shou = e.currentTarget.dataset.id;
    if (id_shou == 1) {
      that.setData({
        shoucan2: 2
      })
    } else if (id_shou == 2) {
      that.setData({
        shoucan2: 1
      })
    }
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
  dian: function () {
    this.setData({
      actionSheetHidden: !this.data.actionSheetHidden
    })
  },
  actionSheetbindchange: function () {
    this.setData({
      actionSheetHidden: !this.data.actionSheetHidden
    })
  },
  shoucang: function () {
  },
  jubao: function () {
    wx.navigateTo({
      url: '../report/report',
    })
  },
  taolun:function(e){
    wx.navigateTo({
      url: '../discussing/discussing',
    })
  }
})