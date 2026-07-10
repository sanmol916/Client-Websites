/**
 * GET /api/meta-config
 * Returns the PUBLIC Meta Pixel ID (safe to expose) so the browser can init the Pixel.
 * The Pixel ID is stored as a Vercel Environment Variable: META_PIXEL_ID
 * (The secret Access Token is NEVER sent to the browser.)
 */
module.exports = (req, res) => {
  res.setHeader("Cache-Control", "public, max-age=300");
  // Pixel ID is public (it appears in the browser anyway). Env var can override it.
  res.status(200).json({ pixelId: process.env.META_PIXEL_ID || "1562080155308094" });
};
