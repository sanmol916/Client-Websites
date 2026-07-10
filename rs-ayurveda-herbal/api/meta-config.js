/**
 * GET /api/meta-config
 * Returns the PUBLIC Meta Pixel ID (safe to expose) so the browser can init the Pixel.
 * The Pixel ID is stored as a Vercel Environment Variable: META_PIXEL_ID
 * (The secret Access Token is NEVER sent to the browser.)
 */
module.exports = (req, res) => {
  res.setHeader("Cache-Control", "public, max-age=300");
  res.status(200).json({ pixelId: process.env.META_PIXEL_ID || "" });
};
